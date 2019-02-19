@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create Prepaid</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{route('order.storeproduct')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input type="hidden" value="{{$product->id}}" name="idproduct">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Order Product.</label>
                            <input type="text" value="{{$product->product_name }}" class="form-control" name="product_name" aria-describedby="emailHelp" readonly>
                            @if($errors->has('product_name'))<small id="emailHelp" class="form-text text-muted">{{$errors->first('product_name')}}</small>@endif
                        </div>
                        <div class="form-group">
                           @if($product->foto)
                            <img src="{{asset('storage/'.$product->foto)}}" width="100px">
                           @endif
                        </div>
                     
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea class="form-control" name="alamat" value="alamat" id="exampleFormControlTextarea1" rows="3" required>{{old('alamat')}}</textarea>
                            @if($errors->has('alamat'))<small id="emailHelp" class="form-text text-muted">{{$errors->first('alamat')}}</small>@endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Price</label>
                            <input type="number" value="{{$product->price}}" class="form-control" name="price" readonly>
                            @if($errors->has('price'))<small id="emailHelp" class="form-text text-muted">{{$errors->first('price')}}</small>@endif
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                   
                

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
