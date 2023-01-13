@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
        <div class="cnt-width cnt-mg-top auth-flame">
            <h2 class="form-ttl">欠席履歴</h2>
            @if($message = Session::get('success'))
            <div class="alert-success">
                {{ $message }}
            </div>
            @endif
            <div class="auth-form" style="margin-top: 50px;">
                <div class="register">
                    <a href="{{ route('absences.create') }}">新規欠席連絡</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
