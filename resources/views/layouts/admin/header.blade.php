<header class="cnt-position admin-header">
    <div class="header cnt-width flex">
        <div>
            <a href="/tonttu" class="flex logo">
                <img src="{{ asset('img/tonttu/tonttu.png') }}" alt="tonttu" class="logo-img">
                <p class="logo-p">tonttu</p>
            </a>
        </div>
        <nav>
            <ul class="flex">
                <li><a href="{{ route('admin.register') }}">会員登録</a></li>
                <li><a href="{{ route('admin.login') }}">ログイン</a></li>
            </ul>
        </nav>
    </div>
</header>