@extends('layouts.admin.template')

@section('main')
<div>
    <div>
        {{ __('パスワードを忘れましたか？登録したメールアドレスに新しいパスワードを設定できるご案内を送ります。') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('admin.password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" value="email">メールアドレス</label>
            <input id="email" class="" type="email" name="email" value="{{ old('email') }}" required autofocus>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <button>
                {{ __('メールアドレスにリセットパスワードを送る') }}
            </button>
        </div>
    </form>
</div>
@endsection