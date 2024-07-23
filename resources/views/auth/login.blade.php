@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="index.html"><img src="{{ asset('assets/admin/compiled/svg/logo.svg') }}" alt="Logo"></a>
            </div>
            @include('components.admin.alert')
            <h1 class="auth-title">Log in.</h1>
            <p class="auth-subtitle mb-5">Log in with your data that you have.</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" class="form-control form-control-xl" name="email" value="{{ old('email') }}"
                        placeholder="E-Mail" autocomplete="email" autofocus>
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" name="password" placeholder="Password"
                        autocomplete="current-password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>

                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" name="remember" type="checkbox" {{ old('remember') ? 'checked'
                        : '' }} id="flexCheckDefault">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
            </form>

            @if (Route::has('password.request'))
            <div class="text-center mt-5 text-lg fs-4">
                <p class="text-gray-600">Forgot password? <a href="{{ route('password.request') }}"
                        class="font-bold">Here</a>.</p>
            </div>
            @endif

        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

@endsection
