@extends('layouts.dashboard')

@section('content')

            <div class="card">
                <div class="card-header">Add Barber</div>
                <div class="card-body">
                    <form action="{{ route('barber.store') }}" method="post">
                        @csrf
                        <div class="input-group input-group-static mb-4">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="firstname">
                        </div>
                        @if ($errors->has('firstname'))
                            <span class="text-danger ">{{ $errors->first('firstname') }}</span>
                        @endif


                        <div class="input-group input-group-static mb-4">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lastname">
                        </div>
                        @if ($errors->has('lastname'))
                            <span class="text-danger ">{{ $errors->first('lastname') }}</span>
                        @endif


                        <div class="input-group input-group-static mb-4">
                            <label>Telephone</label>
                            <input type="text" class="form-control" name="telephone">
                        </div>
                        @if ($errors->has('telephone'))
                            <span class="text-danger ">{{ $errors->first('telephone') }}</span>
                        @endif


                        <div class="input-group input-group-static mb-4">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        @if ($errors->has('username'))
                            <span class="text-danger ">{{ $errors->first('username') }}</span>
                        @endif


                        <div class="input-group input-group-static mb-4">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        @if ($errors->has('email'))
                            <span class="text-danger ">{{ $errors->first('email') }}</span>
                        @endif


                        <div class="input-group input-group-static mb-4">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        @if ($errors->has('password'))
                            <span class="text-danger ">{{ $errors->first('password') }}</span>
                        @endif


                            <button type="submit" class="btn btn-dark btn-block">Add</button>
                    </form>
        </div>
    </div>
@endsection
