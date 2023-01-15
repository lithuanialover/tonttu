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
    {{-- Jump To Top --}}
    <div id="page_top"><a href="#">TOP</a></div>
    {{-- Google Map API --}}
    <script src="{{ asset('js/map.js') }}" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyDlECI9g5hLBBg_EB883ZOFEyVGRJKI7Sk&callback=initMap" async defer>
    </script>
</body>

</html>