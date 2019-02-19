@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('order.success')}}">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pay your order</label>
                            <input type="hidden" class="form-control" name="id" value="{{$order->id}}" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                            <input type="hidden" class="form-control" name="mobile_number" value="{{$order->mobile_number}}" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                            <input type="hidden" class="form-control" name="shipping_address" value="{{$order->shipping_address}}" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                            <input type="text" class="form-control" name="invoice_number" value="{{$order->invoice_number}}" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                            @if($errors->has('invoice_number'))<small id="emailHelp" class="form-text text-muted">{{$errors->first('mobile_number')}}</small>@endif
                        </div>

                        
                        <center><button type="submit" name="status" class="btn btn-primary btn-sm">Pay Now</button></center>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
