<!DOCTYPE html>
<html lang="ja">

<head>
    @component('layouts.head')
    @endcomponent
</head>

<body class="container">
    @component('layouts.admin.header')
    @endcomponent
    <main class="main">
        @yield('main')
    </main>
    @component('layouts.footer')
    @endcomponent
</body>

</html>