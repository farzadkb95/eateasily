<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/favicon.png" type="image/svg+xml">
    <title>@yield('title', 'default title')</title>
    <meta name="description" content="@yield('info', 'default description')">
    <meta name="keywords" content="@yield('keys', 'default keywords')">
    <meta property="og:title" content="@yield('title', 'default og:title')" />
    <meta property="og:description" content="@yield('info', 'default og:description')" />
    <meta property="og:image" content="@yield('image', 'default og:image')" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    {{-- other meta tags --}}

    {{-- tags we want add just in production mode --}}
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
