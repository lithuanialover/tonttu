<!DOCTYPE html>
<html lang="ja">

<head>
    @component('layouts.head')
    @endcomponent
</head>

<body class="container">
    @component('layouts.lp.header')
    @endcomponent
    <main class="main">
        @yield('main')
    </main>
    @component('layouts.lp.footer')
    @endcomponent
</body>

</html>