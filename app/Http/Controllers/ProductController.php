<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::paginate(10);

        return view('product.index',['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(),[

            'product_name' => 'required|min:5|max:150',
            'keterangan' => 'required|min:10|max:150',
            'price' => 'required|numeric'

        ])->validate();


        $product = new Product;
        $product->product_name = $request->get('product_name');
        $product->keterangan = $request->get('keterangan');
        $product->price = $request->get('price');

        if($request->file('foto')){

            $file = $request->file('foto')->store('foto_produk','public');

            $product->foto = $file;

        }

        $product->save();

        return redirect()->route('product.create')->with('status','Data tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('product.edit',['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        \Validator::make($request->all(),[

            'product_name' => 'required|min:5|max:150',
            'keterangan' => 'required|min:10|max:150',
            'price' => 'required|numeric'

        ])->validate();

        $product = Product::findOrFail($id);
        $product->product_name = $request->get('product_name');
        $product->keterangan = $request->get('keterangan');
        $product->price = $request->get('price');

        if($request->file('foto')){

            if(file_exists(storage_path('app/public/'.$product->foto))){
                \Storage::delete('public/'.$product->foto);
            }

            $foto = $product->file('foto')->store('foto_produk','public');

            $product->foto = $foto;

        }

        $product->update();

        return redirect()->route('product.edit',['id'=>$product->id])->with('status','Data berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('status','Data berhasil dihapus');
    }

    public function trash(){

        $product = Product::onlyTrashed()->paginate(10);

        return view('product.trash',['product'=>$product]);

    }

    public function restore($id){

        $product = Product::withTrashed()->findOrFail($id);

        if($product->trashed()){

            $product->restore();

            return redirect()->route('product.trash')->with('success','Data berhasil di restore');

        }

    }

    public function permanentdelete($id){

        $product = Product::withTrashed()->findOrFail($id);

        if($product->trashed()){

            $product->forceDelete();

            return redirect()->route('product.trash')->with('success','Data berhasil dihapus permanen');

        }

    }

    public function orderpage(){

        $product = Product::paginate(10);

        return view('product.orderpage',['product'=>$product]);

    }
    
    
}
