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

                    <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input type="text" value="{{old('product_name')}}" class="form-control" name="product_name" aria-describedby="emailHelp">
                            @if($errors->has('product_name'))<small id="emailHelp" class="form-text text-muted">{{$errors->first('product_name')}}</small>@endif
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Foto Produk</label>
                            <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="exampleFormControlTextarea1" rows="3">{{old('keterangan')}}</textarea>
                            @if($errors->has('keterangan'))<small id="emailHelp" class="form-text text-muted">{{$errors->first('keterangan')}}</small>@endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Price</label>
                            <input type="number" value="{{old('price')}}" class="form-control" name="price">
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
