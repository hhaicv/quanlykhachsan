@extends('layouts.app')

@section('content')
    <section class="body-page page-v1">
        <div class="container">
            <div class="content">
                <h2 class="sky-h3">{{ __('Reset Password') }}</h2>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                            placeholder="Email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password" placeholder="Password *">
                        <span class="fa fa-fw fa-eye field-icon toggle-password " data-toggle="#password"></span>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Confirm Password *">
                        <span class="fa fa-fw fa-eye field-icon toggle-password " data-toggle="#password-confirm"></span>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </form>

            </div>
        </div>
    </section>
    
@endsection
