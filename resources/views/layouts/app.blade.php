<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <title>@yield('title', 'default title')</title>
    <meta name="description" content="@yield('info', 'default description')">
    <meta name="keywords" content="@yield('keys', 'default keywords')">
    <meta property="og:title" content="@yield('title', 'default og:title')" />
    <meta property="og:description" content="@yield('info', 'default og:description')" />
    <meta property="og:image" content="@yield('image', 'default og:image')" />

    {{-- other meta tags --}}

    {{-- tags we want add just in production mode --}}
    @production
        <link rel="manifest" href="/manifest.json" />
    @endproduction
</head>

<body>
    {{-- our vue app mount here --}}
    <div id="app">
        @section('content')
            default content before page load
        @show
    </div>

    @vite('resources/js/app.js')
</body>

</html>
