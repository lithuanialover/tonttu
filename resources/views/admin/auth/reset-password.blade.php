@extends('layouts.admin.template')

@section('main')
<div>
    <form method="POST" action="{{ route('admin.password.store') }}">
        @csrf

        <!-- Password Reset Token --> {{-- route('token')を route('admin.token')変更するの？--}}
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <label for="email" value="email">メールアドレス</label>
            <input id="email" class="" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" value="password">パスワード</label>
            <input id="password" class="" type="password" name="password" required>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" value="confirm_password">確認パスワード</label>

            <input id="password_confirmation"
                                type="password"
                                name="password_confirmation" required>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div>
            <button>
                {{ __('パスワードリセット') }}
            </button>
        </div>
    </form>
</div>
@endsection
