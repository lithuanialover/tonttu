<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>tonttu</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/button.css') }}">

    <link rel="shortcut icon" href="{{ asset('/img/tonttu/tonttu.png') }}">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!--jQuery-->
	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script><!--QR Reader-->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>