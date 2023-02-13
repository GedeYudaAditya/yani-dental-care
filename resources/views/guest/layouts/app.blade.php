<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yani Dantel Care ::. {{ $title }}</title>

    {{-- Bootsrap --}}
    <link rel="stylesheet" href={{ asset('css/app.css') }}>

    {{-- Guest css --}}
    <link rel="stylesheet" href={{ asset('css/guest.css') }}>

    {{-- Plugin Head --}}
    @yield('plugin-head')
</head>

<body style="overflow-x: hidden">

    {{-- Start of Nav Bar --}}
    @include('components.navbar')
    {{-- End of Nav Bar --}}

    {{-- Start of Content --}}
    <div id="content">
        @yield('content')
    </div>
    {{-- End of Content --}}

    {{-- Start of Footer --}}
    @include('components.footer')
    {{-- End of Footer --}}

    {{-- Bootsrap --}}
    <script src={{ asset('js/app.js') }}></script>

    {{-- Guest js --}}
    <script src={{ asset('js/guest.js') }}></script>

    {{-- Plugin Body --}}
    @yield('plugin-body')
</body>

</html>
