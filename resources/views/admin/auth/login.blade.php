@extends('layouts.admin.template')

@section('main')
    <div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" value="email">メールアドレス</label>
                <input id="email" class="" type="email" name="email" value="{{ old('email') }}" required autofocus>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" value="password">パスワード</label>

                <input id="password" class=""
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="">
                    <input id="remember_me" type="checkbox" class="" name="remember">
                    <span class="">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="">
                @if (Route::has('admin.password.request'))
                    <a href="{{ route('admin.password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button class="login">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
@endsection
