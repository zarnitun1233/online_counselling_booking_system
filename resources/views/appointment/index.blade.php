@extends('layouts.app')

@section('content')
<div class="row container-fluid mx-auto">
  <h2 class="display-5 text-center">Appointments List</h2>
  @if ($message = Session::get('message'))
    <div class="alert-primary">{{ $message }}</div>
  @endif
  <div class="col-md-12 my-3">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Date</th>
          <th>Time</th>
          <th>Status</th>
          @if (auth()->user()->role != 0)
            <th>Actions</th>
          @endif
        </tr>
      </thead>
      <tbody>
        @php $number = 1; @endphp
        @foreach($appointments as $appointment)
        <tr>
          <td>{{ $number++; }}</td>
          <td>{{ $appointment->date }}</td>
          <td>{{ $appointment->time }}</td>
          <td>
            @if ($appointment->status === 0)
              Pending
            @elseif ($appointment->status === 1)
              Accepted
              @elseif ($appointment->status === 2)
              Denied
            @endif
          </td>
          @if (auth()->user()->role != 0)
            <td>
              <a href="{{ route('appointments-decision', 1) }}" class="btn btn-success btn-sm">Accept</a>
              <a href="{{ route('appointments-decision', 2) }}" class="btn btn-danger btn-sm">Deny</a>
            </td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection