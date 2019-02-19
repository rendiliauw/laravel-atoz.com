<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Order;
use App\Prepaid;
use App\Product;

class OrderController extends Controller
{
    public function create(Request $request){
      

      $prepaid = Prepaid::all();

      return view('order.create',['prepaid'=>$prepaid]);

     }
        
    

    public function store(Request $request ){
    
       $prefix = rand(100,500).'-'.date('dm').'-'.rand(10,99) ;
       $codelength = 10;

        
       $db = DB::table('orders');
       $db->select(DB::raw('max("invoice_number") as maxkode'));
       $db->where('invoice_number', 'LIKE', "%$prefix%");

       $get = $db->first();
       $data = $get->maxkode;

       if($db->count() > 0){

        $code = substr($data, strlen($prefix));
        $countcode = 1+1;

       }else{
           $countcode = 1;
       }

       $newcode = $prefix.str_pad($countcode, $codelength - strlen($prefix), "0", STR_PAD_LEFT);


       //-------------------------------------------------------------------------------------------------
     
       

        Validator::make($request->all(),[

            'mobile_number' => 'required|digits_between: 7,12|numeric',
            'price' => 'required|numeric'
    
           ])->validate();  
           
           $order = new Order;
           $order->user_id = \Auth::user()->id;
           $order->invoice_number = $newcode;
           $order->mobile_number = $request->get('mobile_number');
           $order->total_price = $request->get('price') + (($request->get('price') * 5) / 100);

           $order->save();

           $order->prepaids()->attach($request->get('id'));
   
           return redirect()->route('order.show',['id' => $order->id]);
           

       
    }

    public function storeproduct(Request $request ){
    
        $prefix = rand(100,500).'-'.date('dm').'-'.rand(10,99) ;
        $codelength = 10;
 
         
        $db = DB::table('orders');
        $db->select(DB::raw('max("invoice_number") as maxkode'));
        $db->where('invoice_number', 'LIKE', "%$prefix%");
 
        $get = $db->first();
        $data = $get->maxkode;
 
        if($db->count() > 0){
 
         $code = substr($data, strlen($prefix));
         $countcode = 1+1;
 
        }else{
            $countcode = 1;
        }
 
        $newcode = $prefix.str_pad($countcode, $codelength - strlen($prefix), "0", STR_PAD_LEFT);
 
 
        //-------------------------------------------------------------------------------------------------            
            $order = new Order;
            $order->user_id = \Auth::user()->id;
            $order->invoice_number = $newcode;
            $order->shipping_address = $request->get('alamat');
            $order->total_price = $request->get('price') + 10000;
 
          
 
            $order->save();
            $order->products()->attach($request->get('idproduct'));

            return redirect()->route('order.show',['id' => $order->id]);
            
 
        
     }

 

    public function show($id){
    
     $detail = Order::findOrFail($id);

      return view('order.detail',['detail'=>$detail])->with('status','Success!');
    }

   

    public function proses(Request $request){

        $id = $request->get('id');

        $order = Order::findOrFail($id);

        return view('order.payment',['order'=>$order]);

    }



    public function success(Request $request){
        $id = $request->get('id');
        $time = date('Y-m-d').' '.'17:00:00' ;
        
        //$auth = \Auth::user()->id;
        $data = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
        $string = '';
            for($i = 0; $i < 10; $i++) {
                $pos = rand(0, strlen($data)-1);
                $string .= $data{$pos};
                }

        $code = $string;

        $success = Order::findOrFail($id);
//-----------------------------------------------------------------
        $awal= date_create($success->created_at);
        $akhir= date_create('');
        $diff = date_diff($awal,$akhir);
        $task = $diff->format('%i');



//----------------------------------------------------------------------
        if($request->get('shipping_address') && $task < 5){
            
           

            $success->status = 'SUCCESS';
            $success->shipping_code = $code;
            $success->update();
                
            return redirect()->route('order.history')->with('status','Hore, pesanan anda akan segera kami proses');       
           
        
        }elseif($request->get('mobile_number') && $task < 5){

         if($success->created_at > $time) {

            $success->status = 'FAILED';

            $success->update();
    
            return redirect()->route('order.history')->with('status','Maaf, tidak bisa melakukan transaksi di atas Pukul 17:00 WIB');
           
         }

            $success->status = 'SUCCESS';

            $success->update();
 
            return redirect()->route('order.history')->with('status','Hore, pesanan anda akan segera kami proses');
            
           
        }elseif(5 <= $task && $success->status == 'UNPAID'){
           
                $success->status = 'CANCELED';
                $success->update();

                return redirect()->route('order.history')->with('status','Maaf, pesanan anda terpaksa kami cancel karena melewati tenggat waktu yang ditentukan');
    
            
        }else{

          

            $success->status = 'SUCCESS';

            $success->update();
 
            return redirect()->route('order.history')->with('status','Hore, pesanan anda akan segera kami proses Testing');

          

        }
        

    }

    

    public function unpaidorder(Request $request) {

        $keyword = $request->get('keyword');

        if($keyword){

            $auth = \Auth::user()->id;
            $order = Order::with('user')->with('prepaids')->with('products')->where('user_id','=',$auth)->where('status','=','UNPAID')->where('invoice_number','LIKE',"%$keyword%")->orderBy('created_at','DESC')->paginate(20);
    
            return view('order.unpaid',['order' => $order]);

            
        }else{


            $auth = \Auth::user()->id;
            $order = Order::with('user')->with('prepaids')->with('products')->where('user_id','=',$auth)->where('status','=','UNPAID')->orderBy('created_at','DESC')->paginate(20);

            return view('order.unpaid',['order' => $order]);
        }

    }

    public function orderhistory(Request $request){

        $keyword = $request->get('keyword');

        if($keyword){

        $auth = \Auth::user()->id;

        $order = Order::with('user')->with('products')->with('prepaids')->where('user_id','=',$auth)->where('invoice_number','LIKE',"%$keyword%")->orderBy('created_at','DESC')->paginate(20);

        return view('order.history',['order' => $order]);
            
        }else{
            $auth = \Auth::user()->id;

            $order = Order::with('user')->with('products')->with('prepaids')->where('user_id','=',$auth)->orderBy('created_at','DESC')->paginate(20);

        return view('order.history',['order' => $order]);
        }

      
    }

    public function prosesshipping($id){

    
        
        $product = Product::where('id','=',$id)->findOrFail($id);

        return view('order.shipping',['product'=>$product]);


    }

    


}
