@extends('layouts.user.template')

@section('main')
<div class="cnt-position">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="cnt-width auth-flame">
        <p>保護者様用のログイン</p>
        <div class="flex auth-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
        
                <!-- Email Address -->
                <div class="auth-input flex">
                    <label for="email" value="email">メールアドレス</label>
                    <input id="email"  class="input-css" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="メールアドレス">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <!-- Password -->
                <div class="auth-input flex">
                    <label for="password" value="password">パスワード</label>
        
                    <input id="password"
                            class="input-css"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="パスワード">
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <!-- Remember Me -->
                <div class="remember-me">
                    <label for="remember_me">
                        <input id="remember_me" type="checkbox"  name="remember">
                        <span>{{ __('Remember me') }}</span>
                    </label>
                </div>
        
                <div class="auth-submit flex">
                    <div class="auth-btn">
                        <button class="auth-login">
                            {{ __('ログイン') }}
                        </button>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="pw-reset">
                            {{ __('パスワードを忘れましたか?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection