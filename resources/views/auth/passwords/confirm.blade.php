@extends('layouts.app')

@section('content')
<section class="body-page page-v1">
    <div class="container">
        <div class="content">
            <h2 class="sky-h3">{{ __('Confirm Password') }}</h2>
            {{ __('Please confirm your password before continuing.') }}

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                    <span class="fa fa-fw fa-eye field-icon toggle-password " data-toggle="#password"></span>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Confirm Password') }}
                </button>
            </form>
            <p>  @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif</p>
        </div>
    </div>
</section>
@endsection
