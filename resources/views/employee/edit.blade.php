@extends('layouts.admin.admin_layout')

@section('content')


    <div class="d-inline-flex"><h2>Create Store</h2> <a href="{{route('employee.index')}}">
            <button class="btn btn-outline-secondary mx-5">Show Employees</button>
        </a></div>
    <hr class="col-md-5" style="height: 3px"/>
    <form method="post" action="{{route('employee.update',[$employee])}}">


        @csrf
        @method('put')

        @if(session()->has('status'))
            <div class="alert alert-primary">{{session('status')}}</div>
        @endif
        @if(session()->has('nostatus'))
            <div class="alert alert-danger">{{session('nostatus')}}</div>
        @endif

        <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="first_name"
                   value="{{old('first_name',$employee->first_name)}}">
        </div>
        @error('first_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="last_name"
                   value="{{old('last_name',$employee->last_name)}}">
        </div>
        @error('last_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <select class="form-group my-3" aria-label="Default select example" name="store_id">
            <option value="0" selected>Choose the Store</option>

            @foreach($stores as $store)
                @if($store->id==old('store_id',$employee->store_id))
                    <option value="{{$store->id}}" selected>{{$store->store_name}}</option>

                @endif
                <option value="{{$store->id}}">{{$store->store_name}}</option>
            @endforeach

        </select>

        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email"
                   placeholder="example@gmail.com"
                   value="{{old('email',$employee->email)}}">
        </div>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="phone_number"
                   value="{{old('phone_number',$employee->phone_number)}}">
        </div>
        @error('phone_number')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <button type="submit" class="btn btn-primary my-2">Save</button>
    </form>

@endsection



