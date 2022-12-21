@extends('layouts.user.template')

@section('main')
<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" value="email">メールアドレス</label>
            <input id="email"  type="email" name="email" value="{{ old('email') }}" required autofocus>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" value="password">パスワード</label>

            <input id="password"
                            type="password"
                            name="password"
                            required autocomplete="current-password">

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div>
            <label for="remember_me">
                <input id="remember_me" type="checkbox"  name="remember">
                <span>{{ __('Remember me') }}</span>
            </label>
        </div>

        <div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('パスワードを忘れましたか?') }}
                </a>
            @endif

            <button>
                {{ __('ログイン') }}
            </button>
        </div>
    </form>
</div>
@endsection