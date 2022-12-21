@extends('layouts.user.template')

@section('main')
<div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" value="name">名前</label>
            <input id="name"type="text" name="name" value="{{ old('name') }}" required autofocus>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" value="email">メールアドレス</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" value="password">パスワード</label>

            <input id="password"
                            type="password"
                            name="password"
                            required autocomplete="new-password">

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" value="confirm_password">確認パスワード</label>

            <input id="password_confirmation"
                            type="password"
                            name="password_confirmation" required>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div>
            <a href="{{ route('login') }}">
                {{ __('アカウントをお持ちですか？') }}
            </a>

            <button>
                {{ __('会員登録') }}
            </button>
        </div>
    </form>
</div>
@endsection
