@extends('layouts.admin.admin_layout')

@section('content')
    @if(session()->has('status'))
        <div class="alert alert-primary">{{session('status')}}</div>
    @endif
    @if(session()->has('nostatus'))
        <div class="alert alert-danger">{{session('nostatus')}}</div>
    @endif
    <table class="table table-striped text-center">
        <a href="{{route('store.create')}}">
            <button class="btn btn-primary"><strong>+</strong> Create new Store</button>
        </a>
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Logo</th>
            <th scope="col">Store Name</th>
            <th scope="col">Email</th>
            <th scope="col">Website</th>
            <th scope="col">Created_at</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
        @foreach($stores as $store)
            <tr>
                <th scope="row">{{$store->id}}</th>
                <td><img class="img-fluid" src="/{{$store->logo}}" width="100 px"></td>
                <td>{{$store->store_name}}</td>
                <td>{{$store->email}}</td>
                <td>{{$store->website}}</td>
                <td>{{$store->created_at}}</td>
                <td class="text-center">
                    <a href="{{route('store.edit',[$store])}}">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                    <a href="{{url('store/'.$store->id.'/delete')}}">
                        <button class="btn btn-danger mx-3">Delete</button>
                    </a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
