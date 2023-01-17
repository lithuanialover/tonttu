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
        <h3 class="lp-h3"><span class="lp-h3-no">3</span>つの機能</h3>
        <div class="feature-cnt flex">
            <div class="featureText">
                <h2 class="featureNo">01</h2>
                <p class="lp-p">お子様の登園・降園時間をリアルタイムで確認できます。</p>
            </div>
            <div class="featureImg">
                <img src="{{ asset('img/lp/UserAttendance.png') }}" alt="登園降園確認">
            </div>
        </div>
        <div class="feature-cnt flex">
            <div class="featureText">
                <h2 class="featureNo">02</h2>
                <p class="lp-p">事前・当日の欠席連絡ができます。</p>
            </div>
            <div class="featureImg">
                <img src="{{ asset('img/lp/UserAbsent.png') }}" alt="登園降園確認">
            </div>
        </div>
        <div class="feature-cnt flex">
            <div class="featureText">
                <h2 class="featureNo">03</h2>
                <p class="lp-p">お子様の情報をいつでも編集可能。<br>登園・降園報告に必要なQRコードをご自宅で印刷できます。</p>
            </div>
            <div class="featureImg">
                <img src="{{ asset('img/lp/UserQr.png') }}" alt="登園降園確認">
            </div>
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
        <h3 class="lp-h3"><span class="lp-h3-no">4</span>つの機能</h3>
        <div class="feature-cnt flex teacherFeatureCnt">
            <div class="featureText">
                <h2 class="featureNo">01</h2>
                <p class="lp-p">当日の「登園・降園」と「欠席連絡」を同じ画面で確認できます。<br>「履歴」をクリックすると過去の登園・降園履歴を確認できます。</p>
            </div>
            <div class="featureImg">
                <img src="{{ asset('img/lp/AdminAttendance.png') }}" alt="登園降園確認">
            </div>
        </div>
        <div class="feature-cnt flex teacherFeatureCnt">
            <div class="featureText">
                <h2 class="featureNo">02</h2>
                <p class="lp-p">未登園の園児数を確認できます。</p>
            </div>
            <div class="featureImg">
                <img src="{{ asset('img/lp/AdminNonAttendance.png') }}" alt="登園降園確認">
            </div>
        </div>
        <div class="feature-cnt flex teacherFeatureCnt">
            <div class="featureText">
                <h2 class="featureNo">03</h2>
                <p class="lp-p">各園児がタブレットのQRコード読み込み画面で自身のQRコードを読み取らせ、「登園・降園」の報告ができます。<br>登園・降園確認の時間が削減し、子供たちとの時間が増えます。</p>
            </div>
            <div class="featureImg">
                <img src="{{ asset('img/lp/AdminQR.png') }}" alt="登園降園確認">
            </div>
        </div>
        <div class="feature-cnt flex teacherFeatureCnt">
            <div class="featureText">
                <h2 class="featureNo">04</h2>
                <p class="lp-p">過去の登園・降園履歴を確認、CSV出力ができます。</p>
            </div>
            <div class="featureImg">
                <img src="{{ asset('img/lp/AdminCSV.png') }}" alt="登園降園確認">
            </div>
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
<div id="parent" class="cnt-position cnt-mg-top">
    <div class="cnt-width cnt-top cnt-btm">
        <h2 class="lp-ttl">会社概要</h2>
        <div class="flex" style="width: 100%;">
            <div style="width: 45%;">
                <table>
                    <tr>
                        <ul class="about-ul">
                            <li class="about-subttl">会社名</li>
                            <li>株式会社tonttu</li>
                        </ul>
                    </tr>
                    <tr>
                        <ul class="about-ul">
                            <li class="about-subttl">住所</li>
                            <li>東京タワー</li>
                        </ul>
                    </tr>
                    <tr>
                        <ul class="about-ul">
                            <li class="about-subttl">電話番号</li>
                            <li>00-0000-0000</li>
                        </ul>
                    </tr>
                </table>
            </div>
            <div id="map" style="width: 45%;">
            </div>
        </div>
    </div>
</div>
@endsection