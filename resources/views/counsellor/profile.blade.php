@extends('layouts.app')

@section('content')
<div class="row container mx-auto text-center">
  @if ($message = Session::get('message'))
    <div class="alert-success my-3">{{ $message }}</div>
  @endif
  <h2 class="h2 mb-3">{{ $user->name}}'s Profile (
  @if ($user->role === 0)
    User
  @elseif ($user->role === 1)
    Counsellor
  @else
    Admin
  @endif
  )
  </h2>
  <div class="col">
    <table class="table table-striped">
      <tbody>
        <tr>
          <td class="fw-bold h5">Name</td>
          <td>{{ $user->name }}</td>
        </tr>
        <tr>
          <td class="fw-bold h5 align-middle">Profile Picture</td>
          <td><img src="{{ asset('images/profile.png') }}" alt="Profile Picture" style="width: 50px;"></td>
        </tr>
        <tr>
          <td class="fw-bold h5">Email</td>
          <td>{{ $user->email }}</td>
        </tr>
        <tr>
          <td class="fw-bold h5">Phone</td>
          <td>{{ $user->phone }}</td>
        </tr>
        <tr>
          <td class="fw-bold h5">Address</td>
          <td>{{ $user->address }}</td>
        </tr>
      </tbody>
    </table>
    @if (auth()->user()->id != $user->id)
    <a href="{{ route('appointment-create', $user->id) }}" class="btn btn-primary">Make Appointment</a>
    @endif
    <a href="{{ route('counsellors-index') }}" class="btn btn-secondary">Back</a>
  </div>
</div>
@endsection()