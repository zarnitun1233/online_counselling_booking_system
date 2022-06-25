@extends('layouts.app')

@section('content')
<!--Form for questions-->
<div class="row">
  <div class="col-md-12">
    <form action="{{ route('questions.store') }}" method="POST">
      @csrf
      <h2 class="display-5 text-center mb-5">Please answer the following questions</h2>
      <h2 class="display-6 text-center mb-5">(1) Personality Test</h2>
      <div class="form-group row mb-5">
        <label for="personality1" class="text-md-center display-6 col-md-12 text-muted">{{ __('You regularly make new friends') }}</label>

        <div class="row d-flex justify-content-center">
          <div class="text-md-center col-md-6 mt-3">
            <select name="personality1" id="personality1" class="form-select @error('personality1') is-invalid @enderror" value="{{ old('personality1') }}" required autocomplete="personality1" autofocus>
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>

            @error('personality1')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
      </div>

      <div class="form-group row mb-3">
        <label for="personality2" class="text-md-center display-6 col-md-12 text-muted">{{ __('You usually stay clam, even under a lot of pressure') }}</label>

        <div class="row d-flex justify-content-center">
          <div class="text-md-center col-md-6 mt-3">
            <select name="personality2" id="personality2" class="form-select @error('personality2') is-invalid @enderror" value="{{ old('personality2') }}" required autocomplete="personality2" autofocus>
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>

            @error('personality2')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
      </div>

      <h2 class="display-6 text-center mb-5 mt-5">(2) Hobby Test</h2>
      <div class="form-group row mb-5">
        <label for="hobby1" class="text-md-center display-6 col-md-12 text-muted">{{ __('Do you like playing football?') }}</label>

        <div class="row d-flex justify-content-center">
          <div class="text-md-center col-md-6 mt-3">
            <select name="hobby1" id="hobby1" class="form-select @error('hobby1') is-invalid @enderror" value="{{ old('hobby1') }}" required autocomplete="hobby1" autofocus>
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>

            @error('hobby1')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
      </div>

      <div class="form-group row mb-5">
        <label for="hobby2" class="text-md-center display-6 col-md-12 text-muted">{{ __('Do you like coffee?') }}</label>

        <div class="row d-flex justify-content-center">
          <div class="text-md-center col-md-6 mt-3">
            <select name="hobby2" id="hobby2" class="form-select @error('hobby2') is-invalid @enderror" value="{{ old('hobby2') }}" required autocomplete="hobby2" autofocus>
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>

            @error('hobby2')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
      </div>

      <h2 class="display-6 text-center mb-5 mt-5">(3) Mindset Test</h2>
      <div class="form-group row mb-5">
        <label for="mindset1" class="text-md-center display-6 col-md-12 text-muted">{{ __('Musical talent can be learned by anyone') }}</label>

        <div class="row d-flex justify-content-center">
          <div class="text-md-center col-md-6 mt-3">
            <select name="mindset1" id="mindset1" class="form-select @error('mindset1') is-invalid @enderror" value="{{ old('mindset1') }}" required autocomplete="mindset1" autofocus>
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>

            @error('mindset1')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
      </div>

      <div class="form-group row mb-5">
        <label for="mindset2" class="text-md-center display-6 col-md-12 text-muted">{{ __('Do you enjoy learning?') }}</label>

        <div class="row d-flex justify-content-center">
          <div class="text-md-center col-md-6 mt-3">
            <select name="mindset2" id="mindset2" class="form-select @error('mindset2') is-invalid @enderror" value="{{ old('mindset2') }}" required autocomplete="mindset2" autofocus>
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>

            @error('mindset2')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary text-center">Submit</button>
      </div>
    </form>
  </div>
</div>
<!--/Form for questions-->
@endsection