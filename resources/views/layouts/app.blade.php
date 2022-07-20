<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Só Notas') }}</title>
    <meta name="description" content="Emissor de Documentos Fiscais">

    <link rel="icon" href="{{ mix('images/sonotas_logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ mix('images/sonotas_logo.png') }}" type="image/png">

    <meta name="msapplication-TileColor" content="#2E086A">
    <meta name="theme-color" content="#2E086A">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">

    <meta name="twitter:image:src" content="{{ mix('images/sonotas_logo.png') }}">
    <meta name="twitter:site" content="@so_notas">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Só Notas">
    <meta name="twitter:description" content="Emissor de Documentos Fiscais">

    <meta property="og:image" content="{{ mix('images/sonotas_logo.png') }}">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="640">
    <meta property="og:site_name" content="Só Notas">
    <meta property="og:type" content="object">
    <meta property="og:title" content="Só Notas">
    <meta property="og:url" content="{{ mix('images/sonotas_logo.png') }}">
    <meta property="og:description" content="Emissor de Documentos Fiscais">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="{{ $class ?? '' }} theme-light">
    <div class="page page-center" id="app">
        @auth()
            @include('layouts.page_templates.auth')
        @endauth()
        @guest()
            @include('layouts.page_templates.guest')
        @endguest
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>
