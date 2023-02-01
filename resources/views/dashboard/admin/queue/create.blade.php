@extends('layouts.dashboard')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <div class="card">
        <div class="card-header">Add Queue</div>
        <div class="card-body">
            <form action="{{ route('queue.store') }}" method="post">
                @csrf
                <div class="input-group input-group-static mb-4">
                    <label>Barber</label>
                    <select name="barber_id" class="form-select mt-4 ">
                        <option value="" selected disabled>เลือกช่าง</option>"
                        @foreach ($barber as $row)
                            <option value={{ $row->id }}>{{ $row->firstname }} {{ $row->lastname }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('barber_id'))
                    <span class="text-danger ">{{ $errors->first('barber_id') }}</span>
                @endif
                <div class="input-group input-group-static mb-4">
                    <label>User</label>
                    <select name="user_id" class="form-select mt-4 ">
                        <option value="" selected disabled>เลือกลูกค้า</option>"
                        @foreach ($user as $row)
                            <option value={{ $row->id }}>{{ $row->firstname }} {{ $row->lastname }} {{ $row->username }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('user_id'))
                    <span class="text-danger ">{{ $errors->first('user_id') }}</span>
                @endif




                <div class="input-group input-group-static mb-4">
                    <label>Start</label>
                    <input type="datetime-local" class="form-control " name="start">
                </div>
                @if ($errors->has('start'))
                    <span class="text-danger ">{{ $errors->first('start') }}</span>
                @endif


                <div class="input-group input-group-static mb-4">
                    <label>End</label>
                    <input type="datetime-local" class="form-control" name="end">
                </div>
                @if ($errors->has('end'))
                    <span class="text-danger ">{{ $errors->first('end') }}</span>
                @endif




                <button type="submit" class="btn btn-dark btn-block">Add</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection
