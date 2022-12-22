@extends('layouts.admin.template')

@section('main')
<div class="cnt-position">
    <div class="cnt-width auth-flame">
        <p class="auth-p">パスワードを忘れましたか？<br>登録したメールアドレスに新しいパスワードのご案内を送ります。</p>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <div class="flex auth-form">
            <form method="POST" action="{{ route('admin.password.email') }}">
                @csrf
        
                <!-- Email Address -->
                <div>
                    <label for="email" value="email">メールアドレス</label>
                    <input id="email" class="input-css" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="メールアドレス">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <div class="auth-submit flex">
                    <div class="auth-btn">
                        <button class="auth-register">
                            {{ __('送信') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection