@extends('layouts.lp.template')

@section('main')
<div class="firstview">
    <p>こども達を<span>共に</span>みまもろう</p>
</div>
<div id="message" class="cnt-position cnt-mg-top">
    <div class="cnt-width cnt-top">
        <div class="flex">
            <img src="{{ asset('img/tonttu/message.png') }}" alt="tonttu" class="message-img">
            <div class="message-txt">
                <h2 class="lp-ttl"><span class="logo">tonttu</span></h2>
                <p>北欧フィンランドに伝わる妖精、"tonttu(トントゥ)"は、<br>
                人々の幸せを見守るというお話があります。<br>
                tonttuのように、<br>
                私たちの大切な子ども達を見守りませんか?</p>
            </div>
        </div>
    </div>
</div>
<div id="parent" class="cnt-position cnt-mg-top">
    <div class="cnt-width cnt-top cnt-btm">
        <h2 class="lp-ttl">保護者へ</h2>
        <div>
            <p>保護者ページの使い方ガイドを載せる</p>
        </div>
        <div class="flex lp-btn-position">
            <div class="register">
                <a href="{{ route('register') }}">会員登録</a>
            </div>
            <div class="login">
                <a href="{{ route('login') }}">ログイン</a>
            </div>
        </div>
    </div>
</div>
<div id="teacher" class="cnt-position cnt-mg-top">
    <div class="cnt-width cnt-top cnt-btm">
        <h2 class="lp-ttl">幼稚園 保育園の先生へ</h2>
        <div>
            <p>幼稚園 保育園ページの使い方ガイドを載せる</p>
        </div>
        <div class="flex lp-btn-position">
            <div class="register">
                <a href="{{ route('admin.register') }}">会員登録</a>
            </div>
            <div class="login">
                <a href="{{ route('admin.login') }}">ログイン</a>
            </div>
        </div>
    </div>
</div>
@endsection