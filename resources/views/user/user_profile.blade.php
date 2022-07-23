@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card my-5">
<div class="card-body">
    <div class="card-header">
    <h1>My Profile</h1>
    </div>
    @if(session()->has('status'))
        <div class="alert alert-primary" role="alert">
            {{session('status')}}
        </div>
    @endif
    <p>Name : {{$user->name}}</p>
    <p>Email : {{$user->email}}</p>
    <p>Role : {{$user->role}}</p>

    <p>Data e krijimit : {{$user->created_at}}</p>
    <p>Data e editimit : {{$user->update_at}}</p>
    <a href="{{route('home')}}" ><button class="btn-secondary btn-lg">Back</button></a>

    <a href="{{route('user.edit_profile')}}" ><button class=" btn-success btn-lg">Edit</button></a>
</div>
    </div>
    </div>
@endsection
