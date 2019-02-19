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

                
                   
                <div class="row">
                    <div class="col-4">
                    <a role="button" href="{{route('prepaid.create')}}" class="btn btn-secondary  mb-3">+ Add</a>
                    <a role="button" href="{{route('prepaid.trash')}}" class="btn btn-danger  mb-3">Trash</a>
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
                            <th scope="col">Keterangan</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </thead>

                        @foreach($prepaid as $data)
                        <tbody>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{'Rp '.$data->keterangan}}</td>
                            <td>{{$data->price}}</td>
                            <td>
                                <a role="button" href="{{route('prepaid.edit',['id' => $data->id])}}" class="btn btn-primary btn-sm">Edit</a>

                                <form action="{{route('prepaid.destroy',['id'=>$data->id])}}" class="d-inline" method="post" onsubmit=" return confirm('Anda yakin ingin menghapus data ?')">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                    <button type="submit" href="{{route('prepaid.destroy',['id' => $data->id])}}" class="btn btn-warning btn-sm">Del</button>
                                </form>
                            </td>
                        </tbody>
                        @endforeach
                   </table>
                </div>
                   {{$prepaid->appends(Request::all())->links()}}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
