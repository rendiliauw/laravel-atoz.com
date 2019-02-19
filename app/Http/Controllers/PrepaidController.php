<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Prepaid;
use App\Order;

class PrepaidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $prepaid = Prepaid::paginate(10);   

        return view('prepaid.index',['prepaid'=>$prepaid]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prepaid.create');
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
              
            'keterangan' => 'required',
            'price' => 'required|digits_between:0,10'

        ])->validate();

        $prepaid = new Prepaid;
        $prepaid->keterangan = $request->get('keterangan');
        $prepaid->price = $request->get('price');
        $prepaid->save();

        return redirect()->route('prepaid.create')->with('status','Data tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prepaid = Prepaid::findOrFail($id);

        return view('prepaid.edit',['prepaid'=>$prepaid]);
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

        $prepaid = Prepaid::findOrFail($id);
        $prepaid->keterangan = $request->get('keterangan');
        $prepaid->price = $request->get('price');
        $prepaid->update();

        return redirect()->route('prepaid.edit', ['id'=> $prepaid->id])->with('status','Data terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prepaid = Prepaid::findOrFail($id);
        $prepaid->delete();

        return redirect()->route('prepaid.index')->with('status','Data berhasil dihapus');
    }

    public function trash(){

        $prepaid = Prepaid::onlyTrashed()->paginate(10);

        return view('prepaid.trash',['prepaid'=>$prepaid]);

    }

    public function restore($id){

        $prepaid = Prepaid::withTrashed()->findOrFail($id);

        if($prepaid->trashed()){

            $prepaid->restore();
            
            return redirect()->route('prepaid.trash')->with('status','Data berhasil di restore');

        }

    }

    public function permanentDelete($id){

        $prepaid = Prepaid::withTrashed()->findOrFail($id);

        if($prepaid->trashed()){

            $prepaid->forceDelete();

            return redirect()->route('prepaid.trash')->with('status','Data permanen dihapus');

        }

    }

    public function orderpage(){

        $prepaid = Prepaid::all();

        return view('prepaid.orderpage',['prepaid'=>$prepaid]);

    }

   

}
