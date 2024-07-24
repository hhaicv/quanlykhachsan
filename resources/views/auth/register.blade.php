@extends('layouts.app')

@section('content')
    <section class="body-page page-v1">
        <div class="container">
            <div class="content">
                <h2 class="sky-h3">{{ __('Register') }}</h2>
                <h5 class="p-v1">If you no have account in The Lotus Hotel! Register and feeling</h5>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="User Name *">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            name="name" value="" placeholder="Email *">

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
                        <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password *">
                        <span class="fa fa-fw fa-eye field-icon toggle-password " data-toggle="#password-confirm"></span>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
