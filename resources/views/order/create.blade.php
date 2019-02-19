@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Prepaid Balance</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('order.store')}}">
                    {{csrf_field()}}

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mobile Number</label>
                            <input type="text" class="form-control" name="mobile_number" value="{{old('mobile_number')}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @if($errors->has('mobile_number'))<small id="emailHelp" class="form-text text-muted">{{$errors->first('mobile_number')}}</small>@endif
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Nominal</label>
                            <select class="form-control" name="price" id="exampleFormControlSelect1">
                            <option value="#">--Pilih Nominal--</option>
                            @foreach($prepaid as $result)
                            <option value="{{$result->price}}">{{'Rp '.$result->keterangan}}</option>
                            @endforeach
                            </select>
                            @if($errors->has('price'))<small id="emailHelp" class="form-text text-muted">{{$errors->first('price')}}</small>@endif
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
