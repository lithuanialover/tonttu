@extends('layouts.admin.template')

@section('main')
<div class="cnt-position">
    <div class="cnt-width auth-flame">
        <p>パスワードを承認してください。</p>
        <div class="flex auth-form">
            <form method="POST" action="{{ route('admin.password.confirm') }}">
                @csrf
        
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
        
                <div class="auth-submit flex">
                    <div class="auth-btn">
                        <button class="auth-login">
                            {{ __('承認') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection