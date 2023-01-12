<header class="cnt-position user-header">
    <div class="header cnt-width flex">
        <div>
            <a href="{{ route('dashboard') }}" class="flex logo">
                <img src="{{ asset('img/tonttu/tonttu.png') }}" alt="tonttu" class="logo-img">
                <p class="logo-p">tonttu</p>
            </a>
        </div>
        <nav>
            <ul class="flex">
                <li>{{ Auth::user()->name }}さん</li>
                {{-- <li>
                    <a href="{{ route('profile.edit') }}">
                        {{ __('Profile') }}
                    </a>
                </li> --}}
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</header>