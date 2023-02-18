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
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('plugin-head')
</head>

<body onload="myFunction()" style="overflow-x: hidden">

    <div id="loading" class="row justify-content-center align-items-center">
        <div class="col-12 spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

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

    {{-- Guest js --}}
    <script src={{ asset('js/guest.js') }}></script>

    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    @stack('scripts')

    {{-- Plugin Body --}}
    @yield('plugin-body')

    <script>
        var myVar;

        function myFunction() {
            myVar = setTimeout(showPage, 3000);
        }

        function showPage() {
            document.getElementById("loading").style.display = "none";
        }
    </script>
</body>

</html>
