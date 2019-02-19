@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Master Prepaid</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{session('status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                
                   
                <div class="row mb-4"> 
                    <div class="col-4">
                  
                    </div>
                   <div class="col-4">
                   
                   </div>
                   <div class="col-4">
                   <form class="form-inline">
                        <input class="form-control " type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success " type="submit">Search</button>
                  </form>
                   </div>
                </div>
                   <table class="table table-hover">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </thead>

                        @foreach($product as $trash)

                        <tbody>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>
                                @if($trash->foto)
                                    <img src="{{asset('storage/'.$trash->foto)}}" width="100px">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{$trash->product_name}}</td>
                            <td style="width:200px;">{{$trash->keterangan}}</td>
                            <td>{{$trash->price}}</td>
                            <td>
                                <a role="button" href="{{route('product.restore',['id' => $trash->id])}}" class="btn btn-primary btn-sm">Restore</a>
                                <a role="button" href="{{route('product.permanentdelete',['id'=> $trash->id])}}" class="btn btn-warning btn-sm">Delete</a>
                            </td>
                        </tbody>
                        
                        @endforeach
                   </table>

                   {{$product->appends(Request::all())->links()}}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
