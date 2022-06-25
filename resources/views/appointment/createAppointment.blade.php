@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Make Appointment Form') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('appointment-store', $id) }}">
            @csrf
            <div class="row mb-3">
              <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>

              <div class="col-md-6">
                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

                @error('date')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="time" class="col-md-4 col-form-label text-md-end">{{ __('Time') }}</label>

              <div class="col-md-6">
                <input id="time" type="time" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}" required autocomplete="time" autofocus>

                @error('time')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Submit') }}
                </button>
                <button type="cancel" class="btn btn-secondary" onclick="history.back()">
                  {{ __('Back') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection