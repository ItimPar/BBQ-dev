@extends('layouts.dashboard')

@section('content')

    <div class="card">

        <div class="p-4">
            EDIT USER ID : {{ $user->id }}
            <form action="{{ route('user.update',$user->id) }}" method="post">
                @csrf
                <div class="input-group input-group-static mb-4">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}">
                </div>
                @if ($errors->has('firstname'))
                    <span class="text-danger ">{{ $errors->first('firstname') }}</span>
                @endif


                <div class="input-group input-group-static mb-4">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">
                </div>
                @if ($errors->has('lastname'))
                    <span class="text-danger ">{{ $errors->first('lastname') }}</span>
                @endif


                <div class="input-group input-group-static mb-4">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                </div>
                @if ($errors->has('username'))
                    <span class="text-danger ">{{ $errors->first('username') }}</span>
                @endif


                <div class="input-group input-group-static mb-4">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                </div>
                @if ($errors->has('email'))
                    <span class="text-danger ">{{ $errors->first('email') }}</span>
                @endif


                <div class="input-group input-group-static mb-4">
                    <label>Telephone</label>
                    <input type="text" class="form-control" name="telephone" value="{{ $user->telephone }}">
                </div>
                @if ($errors->has('telephone'))
                    <span class="text-danger ">{{ $errors->first('telephone') }}</span>
                @endif




                <button type="submit" class="btn btn-dark btn-block">Submit</button>
            </form>
        </div>


    </div>

@stop
