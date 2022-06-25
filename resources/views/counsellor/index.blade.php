@extends('layouts.app')

@section('content')
<div class="row container-fluid mx-auto">
  <h2 class="display-5 text-center">Counsellor List</h2>
  <h6 class="h4 text-muted text-center">The following are the counsellors that match with your personality, hobby and mindset.</h6>
  <div class="col-md-12 my-3">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Photo</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @php $number = 1; @endphp
        @foreach($counsellors as $counsellor)
        <tr>
          <td>{{ $number++; }}</td>
          <td><img src="{{ asset('images/profile.png') }}" alt="Profile Picture" style="width: 30px;"></td>
          <td>{{ $counsellor->name }}</td>
          <td>{{ $counsellor->email }}</td>
          <td>{{ $counsellor->phone }}</td>
          <td>{{ $counsellor->address }}</td>
          <td>
            <a href="{{ route('counsellors-detail', $counsellor->id) }}" class="btn btn-success btn-sm">Detail</a>
            @if (auth()->user()->role === 2)
            <a href="" class="btn btn-primary btn-sm">Update</a>
            <a href="" class="btn btn-danger btn-sm">Delete</a>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection