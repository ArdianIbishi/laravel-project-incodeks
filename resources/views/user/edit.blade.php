@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card my-4">

        <div class="card-header"><h4>Edit Profile</h4></div>

        <div class="card-body">

            <form action="{{route('user.update_profile')}}" method="post">

                @csrf
                @method('PUT')

                <div class="form-group">

                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">

                    <label for="name">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">

                    <label for="name">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Sheno passwordin" required autocomplete="new-password" >
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <label for="name">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <button class="btn btn-success my-2" type="submit">Save Changes</button>

            </form>



        </div>


    </div>
</div>
@endsection
