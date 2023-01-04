@extends('layouts.user.template')

@section('main')
<div class="cnt-position">
    <div class="cnt-width auth-flame">
        <p>新しいパスワードを登録</p>
        <div class="flex auth-form">
            <form method="POST" action="{{ route('password.store') }}">
                @csrf
        
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
        
                <!-- Email Address -->
                <div class="auth-input flex">
                    <label for="email" value="email">メールアドレス</label>
                    <input id="email" class="input-css" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus placeholder="メールアドレス">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <!-- Password -->
                <div class="auth-input flex">
                    <label for="password" value="password">パスワード</label>
                    <input id="password" class="input-css" type="password" name="password" required placeholder="新しいパスワード">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <!-- Confirm Password -->
                <div class="auth-input flex">
                    <label for="password_confirmation" value="confirm_password">確認パスワード</label>
        
                    <input id="password_confirmation"
                                        class="input-css"
                                        type="password"
                                        name="password_confirmation" required
                                        placeholder="確認パスワード">
        
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
        
                <div class="auth-submit flex">
                    <div class="auth-btn">
                        <button class="auth-register">
                            {{ __('リセットパスワード') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection