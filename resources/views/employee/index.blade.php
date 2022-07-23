@extends('layouts.admin.admin_layout')

@section('content')
    @if(session()->has('status'))
        <div class="alert alert-primary">{{session('status')}}</div>
    @endif
    @if(session()->has('nostatus'))
        <div class="alert alert-danger">{{session('nostatus')}}</div>
    @endif
    <table class="table table-striped text-center">
        <a href="{{route('employee.create')}}">
            <button class="btn btn-primary"><strong>+</strong> Create new Employee</button>
        </a>
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Store Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Created_at</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <th scope="row">{{$employee->id}}</th>
                <td>{{$employee->first_name}}</td>
                <td>{{$employee->last_name}}</td>
                <td>{{$employee->store->store_name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->phone_number}}</td>
                <td>{{$employee->created_at}}</td>
                <td class="text-center">
                        <a href="{{route('employee.edit',[$employee])}}">
                            <button class="btn btn-primary">Edit</button>
                        </a>
                        <a href="{{url('employee/'.$employee->id.'/delete')}}">
                            <button class="btn btn-danger mx-3">Delete</button>
                        </a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
<div>
{{$employees->links()}}
</div>
@endsection
