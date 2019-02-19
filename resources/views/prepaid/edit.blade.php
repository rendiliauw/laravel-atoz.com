@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Prepaid</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{route('prepaid.update',['id'=>$prepaid->id])}}">
                    {{method_field('PUT')}}
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Keterangan</label>
                            <input type="text" value="{{ old('keterangan') ? "old('keterangan')" : $prepaid->keterangan}}" class="form-control" name="keterangan" aria-describedby="emailHelp">
                            @if($errors->has('keterangan'))<small id="emailHelp" class="form-text text-muted">{{$errors->first('keterangan')}}</small>@endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Price</label>
                            <input type="number" value="{{old('price') ? "old('price')" : $prepaid->price }}" class="form-control" name="price">
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
