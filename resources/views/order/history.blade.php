@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">History Order</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{session('status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

            <div class="row mb-3">
                <div class="col-4">
                    <!-- <a role="button" href="{{route('product.create')}}" class="btn btn-secondary  mb-3">+ Add</a>
                    <a role="button" href="{{route('product.trash')}}" class="btn btn-danger  mb-3">Trash</a> -->
                    </div>
                <div class="col-4">
                   
                </div>
                <div class="col-4">
                   <form class="form-inline" method="get" action="{{route('order.history')}}">
                        <input class="form-control " type="text" name="keyword" value="{{Request::get('keyword')}}" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success " type="submit">Search</button>
                  </form>
                </div>
            </div>

                <div class="table-responsive">                   
                   <table class="table table-hover">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Invoice number</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            
                        </thead>

                        @foreach($order as $data)
                        <tbody>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$data->invoice_number}}</td>
                            <td>@if(!$data->shipping_address){{$data->mobile_number}}@else{{$data->shipping_address}}@endif</td>
                            <td>{{'Rp '.$data->total_price}}</td>
                            <td>
                        @if($data->status == 'SUCCESS')
                            <span class="badge badge-warning">{{ $data->mobile_number ? $data->status : $data->shipping_code}}</span>
                        @elseif($data->status == 'FAILED')
                            <span class="badge badge-danger">{{$data->status}}</span>
                        @elseif($data->status == 'CANCELED')
                            <span class="badge badge-info">{{$data->status}}</span>
                        @else
                            <form action="{{route('order.proses',['id'=>$data->id])}}" method="POST">
                            {{csrf_field()}}
                             <input type="hidden" name="id" value="{{$data->id}}">
                             <input type="hidden" name="invoice_number" value="{{$data->invoice_number}}">
                             <input type="submit" class="btn btn-primary btn-sm" value="Pay now">
                            </form>
                        @endif
                            </td>
                            
                        </tbody>
                        @endforeach
                   </table>

                   </div>

                  {{$order->appends(Request::all())->links()}}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
