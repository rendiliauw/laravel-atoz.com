@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Product Page</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                
               
                    <div class="row">
                    @foreach($product as $order)
                        <div class="col md-4">

                        <div class="card mb-3">
                            <img class="card-img-top" src="{{asset('storage/'.$order->foto)}}" width="50px">
                        <div class="card-body">
                            <p class="card-title">{{$order->product_name}}</p>
                            <p class="card-text">{{'Rp '.$order->price}}</p>
                            <form action="{{route('order.prosesshipping',['id'=>$order->id])}}" method="post" >
                            {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$order->id}}">
                                <input type="hidden" name="product_name" value="{{$order->product_name}}">
                                <input type="hidden" name="total_price" value="{{$order->total_price}}">
                                <center><input type="submit" value="Order" class="btn btn-primary"></center>
                            </form>
                        </div>
                        </div>

                        </div>
                        @endforeach    
                   </div>
               
                
                   
                

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
