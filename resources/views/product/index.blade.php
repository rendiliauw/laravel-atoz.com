@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Master Product</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{session('status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                
                   
                <div class="row">
                    <div class="col-4">
                    <a role="button" href="{{route('product.create')}}" class="btn btn-secondary  mb-3">+ Add</a>
                    <a role="button" href="{{route('product.trash')}}" class="btn btn-danger  mb-3">Trash</a>
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
                <div class="table-responsive">
                   <table class="table table-hover">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </thead>

                        @foreach($product as $data)
                        <tbody>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>
                                @if($data->foto)
                                    <img src="{{asset('storage/'.$data->foto)}}" width="100px">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{$data->product_name}}</td>
                            <td style="width:200px;">{{$data->keterangan}}</td>
                            <td>{{$data->price}}</td>
                            <td>
                                <a role="button" href="{{route('product.edit',['id' => $data->id])}}" class="btn btn-primary btn-sm">Edit</a>

                                <form action="{{route('product.destroy',['id'=>$data->id])}}" class="d-inline" method="post" onsubmit=" return confirm('Anda yakin ingin menghapus data ?')">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                    <button type="submit" href="{{route('product.destroy',['id' => $data->id])}}" class="btn btn-warning btn-sm">Del</button>
                                </form>
                            </td>
                        </tbody>
                        @endforeach
                   </table>
                </div>
                 
                {{$product->appends(Request::all())->links()}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
