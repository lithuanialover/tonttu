@extends('layouts.admin.template')

@section('main')
<div>
    <div>
        {{ __('パスワードを承認してください。') }}
    </div>

    <form method="POST" action="{{ route('admin.password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <label for="password" value="password">パスワード</label>

            <input id="password"
                            type="password"
                            name="password"
                            required autocomplete="current-password">

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <button>
                {{ __('Confirm') }}
            </button>
        </div>
    </form>
</div>
@endsection