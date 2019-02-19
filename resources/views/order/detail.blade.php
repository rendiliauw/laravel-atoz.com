@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Transaction</div>

                <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            Success!
                        </div>

                    <div class="row">
                        <div class="col">
                        <p><b>Order No.</b></p>
                        </div>
                        <div class="col">
                        <p>{{$detail->invoice_number}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <p><b>Total</b></p>
                        </div>
                        <div class="col">
                        <p>{{'Rp '.$detail->total_price}}</p>
                        </div>
                    </div>
                    @if(!$detail->mobile_number)
                    <div class="row">   
                        <div class="col">
                        <p style="text-align:justify;">
                        That cost <b>{{"Rp ".$detail->total_price}}</b> 
                        will be shipped to : <b>{{$detail->shipping_address}}</b> only after you pay
                        </p>
                        </div>
                    </div>
                    @elseif(!$detail->shipping_address)
                    <div class="row">   
                        <div class="col">
                        <p style="text-align:justify;">
                        Your Mobile Phone Number {{$detail->mobile_number}} 
                        will Receive @if($detail->total_price == 10500) Rp 10.000 @elseif($detail->total_price == 52500) Rp 50.000 @else Rp 100.000 @endif
                        </p>
                        </div>
                    </div>
                    @endif
                    <div class="row">   
                        <div class="col">
                        <form action="{{route('order.proses')}}" method="post">
                        {{csrf_field()}}

                        <input type="hidden" name="id" value="{{$detail->id}}">
                        
                        <center><button type="submit" class="btn btn-primary btn-sm" >Pay now</button>
                        </form>
                        
                        </div>
                    </div>
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
