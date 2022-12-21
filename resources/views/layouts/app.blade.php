<!DOCTYPE html>
    <html lang="ja">

    <head>
        @component('layouts.head')
        @endcomponent
    </head>

    <body class="container">
        <div>
            @include('layouts.navigation')
            <main class="main">
                @yield('main')
            </main>
        </div>
    </body>
</html>
