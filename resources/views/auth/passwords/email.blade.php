@extends('layouts.app')

@section('content')
    <section class="body-page page-v1">
        <div class="container">
            <div class="content">
                <h2 class="sky-h3">{{ __('Reset Password') }}</h2>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Password Reset Link') }}
                    </button>
                </form>

            </div>
        </div>
    </section>
@endsection
