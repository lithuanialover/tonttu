@extends('layouts.admin.template')

@section('main')
<div class="cnt-position">
    <div class="cnt-width auth-flame">
        <p>先生用の会員登録</p>
        <div class="flex auth-form">
            <form method="POST" action="{{ route('admin.register') }}">
                @csrf
        
                <!-- Name -->
                <div class="auth-input flex">
                    <label for="name" value="name">名前</label>
                    <input id="name" class="input-css" type="text" name="name" value="{{ old('name') }}" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
        
                <!-- Email Address -->
                <div class="auth-input flex">
                    <label for="email" value="email">メールアドレス</label>
                    <input id="email" class="input-css" type="email" name="email" value="{{ old('email') }}" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <!-- Password -->
                <div class="auth-input flex">
                    <label for="password" value="password">パスワード</label>
        
                    <input id="password" class="input-css"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <!-- Confirm Password -->
                <div class="auth-input flex">
                    <label for="password_confirmation" value="password_confirmation">確認パスワード</label>
        
                    <input id="password_confirmation" class="input-css"
                                    type="password"
                                    name="password_confirmation" required />
        
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
        
                <div class="auth-submit flex">
                    <div class="auth-btn">
                        <button class="auth-register">
                            {{ __('会員登録') }}
                        </button>
                    </div>
                    <a href="{{ route('admin.login') }}" class="pw-reset">
                        {{ __('アカウントをお持ちですか？') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
