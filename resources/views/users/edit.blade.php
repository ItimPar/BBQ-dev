@extends('layouts.dashboard')


@section('content')
<div class="card">

    <div class="p-4">
        EDIT USER ID : {{ $user->id }}
        <form>
          <div class="input-group input-group-static mb-4">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{ $user -> name }}">
          </div>
          <div class="input-group input-group-static mb-4">
            <label>Email</label>
            <input type="email" class="form-control" name="name" value="{{ $user -> email }}">
          </div>
          <div class="input-group input-group-static mb-4">
            <label>Telephone</label>
            <input type="text" class="form-control" name="name" value="{{ $user -> telephone }}">
          </div>
          <div class="input-group input-group-static mb-4">
            <label>Username</label>
            <input type="text" class="form-control" name="name" value="{{ $user -> username }}">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>


  </div>
@stop
