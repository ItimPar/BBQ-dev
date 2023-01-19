@extends('layouts.dashboard')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <div class="card">
        <div class="card-header">Edit Queue</div>
        <div class="card-body">
            <form action="{{ route('queue.update', $queue->id) }}" method="post">
                @csrf
                <div class="input-group input-group-static mb-4">
                    <label>User</label>
                    <select name="user_id" class="form-select mt-4 ">
                        @foreach ($user as $row)
                            <option value={{ $row->id }} {{ $row->id == $queue->user_id ? 'selected':'' }}>{{ $row->username }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('user_id'))
                    <span class="text-danger ">{{ $errors->first('user_id') }}</span>
                @endif


                <div class="input-group input-group-static mb-4">
                    <label>Barber</label>
                    <select name="barber_id" class="form-select mt-4 ">
                        @foreach ($barber as $row)
                            <option value={{ $row->id }} {{ $row->id == $queue->barber_id ? 'selected':'' }}>{{ $row->username }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('barber_id'))
                    <span class="text-danger ">{{ $errors->first('barber_id') }}</span>
                @endif


                <div class="input-group input-group-static mb-4">
                    <label>Date</label>
                    <input type="date" class="form-control " name="reserve_date" value="{{ $queue->reserve_date }}">
                </div>
                @if ($errors->has('reserve_date'))
                    <span class="text-danger ">{{ $errors->first('reserve_date') }}</span>
                @endif


                <div class="input-group input-group-static mb-4">
                    <label>Time</label>
                    <input type="time" class="form-control" name="reserve_time" value="{{ $queue->reserve_time }}">
                </div>
                @if ($errors->has('reserve_time'))
                    <span class="text-danger ">{{ $errors->first('reserve_time') }}</span>
                @endif

                <div class="input-group input-group-static mb-4">
                    <label>Status</label>
                    <select name="status" class="form-select mt-4 ">
                            <option value="รอ" {{ $queue->status == "รอ" ? 'selected':'' }}>รอ</option>
                            <option value="เสร็จ" {{ $queue->status == "เสร็จ" ? 'selected':'' }}>เสร็จ</option>
                            <option value="ยกเลิก" {{ $queue->status == "ยกเลิก" ? 'selected':'' }}>ยกเลิก</option>

                    </select>
                </div>
                @if ($errors->has('status'))
                    <span class="text-danger ">{{ $errors->first('status') }}</span>
                @endif


                <button type="submit" class="btn btn-dark btn-block">Edit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection
