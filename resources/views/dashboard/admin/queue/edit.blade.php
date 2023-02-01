@extends('layouts.dashboard')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <div class="card">
        <div class="card-header">Edit Queue</div>
        <div class="card-body">
            <form action="{{ route('queue.update', $queue->id) }}" method="post">
                @csrf

                                <div class="input-group input-group-static mb-4 w-25">
                                    <label for="barber">Barber</label>
                                    <select name="barber_id" class="form-select mt-4 rounded ps-2" id="barber">
                                        @foreach ($barber as $row)
                                            <option value={{ $row->id }} {{ $row->id == $queue->barber_id ? 'selected':'' }}>{{ $row->firstname }} {{ $row->lastname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('barber_id'))
                                    <span class="text-danger ">{{ $errors->first('barber_id') }}</span>
                                @endif
                <div class="input-group input-group-static mb-4 w-25">
                    <label>User</label>
                    <select name="user_id" class="form-select mt-4 rounded ps-2">
                        @foreach ($user as $row)
                            <option value={{ $row->id }} {{ $row->id == $queue->user_id ? 'selected':'' }}>{{ $row->firstname }} {{ $row->lastname }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('user_id'))
                    <span class="text-danger ">{{ $errors->first('user_id') }}</span>
                @endif



                <div class="input-group input-group-static mb-4 w-25">
                    <label>Start</label>
                    <input type="datetime-local" class="form-control " name="start" value="{{ $queue->start }}">
                </div>
                @if ($errors->has('start'))
                    <span class="text-danger ">{{ $errors->first('start') }}</span>
                @endif


                <div class="input-group input-group-static mb-4 w-25">
                    <label>End</label>
                    <input type="datetime-local" class="form-control" name="end" value="{{ $queue->end }}">
                </div>
                @if ($errors->has('end'))
                    <span class="text-danger ">{{ $errors->first('end') }}</span>
                @endif

                <div class="input-group input-group-static mb-4 w-25">
                    <label>Status</label>
                    <select name="status" class="form-select mt-4 ps-2">
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
