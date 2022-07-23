@extends('layouts.admin.admin_layout')

@section('content')

    <form method="post" action="{{route('store.update',[$store])}}" enctype="multipart/form-data">

        <h2>Update Store</h2>
        <hr class="col-md-5" style="height: 3px"/>
        @csrf
@method('put')
        @if(session()->has('status'))
            <div class="alert alert-primary">{{session('status')}}</div>
        @endif
        @if(session()->has('nostatus'))
            <div class="alert alert-danger">{{session('nostatus')}}</div>
        @endif

        <div class="form-group">
            <label for="exampleInputEmail1">Store Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="store_name"
                   value="{{old('store_name',$store->store_name)}}">
        </div>
        @error('store_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email"
                   placeholder="example@gmail.com"
                   value="{{old('email',$store->email)}}">
        </div>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if($store->logo)
            <div>ok</div>
        @endif

        <div class="form-group">
            <label for="exampleInputEmail1">Image_Logo</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="logo"
                   placeholder="Enter Category Name of donnations">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Website</label>
            <input type="url" class="form-control" id="name" aria-describedby="emailHelp" name="website"
                   placeholder="https://www.example.com"
                   value="{{old('website',$store->website)}}">
        </div>
        @error('website')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary my-2">Save</button>
    </form>

@endsection



