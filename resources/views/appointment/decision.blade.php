@extends('layouts.app')

@section('content')
<div class="row container-fluid mx-auto">
  <div class="col">
    @if ($message = Session::get('message'))
    <div class="alert-primary">{{ $message }}</div>
    @endif
    <a href="{{ route('appointments-index') }}" class="btn btn-secondary">Back</a>
  </div>
</div>
@endsection