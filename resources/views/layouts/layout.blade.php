<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>@yield('pageTitle')</title>
        {{-- css --}}
        <link rel="stylesheet" href="{{ asset('css/app.css')}}" />
        {{-- js --}}
        <script src="{{ asset('js/app.js') }}"></script>
        {{-- Font Awesome --}}
        <script
            src="https://kit.fontawesome.com/da9db4083e.js"
            crossorigin="anonymous"
        ></script>
    </head>
    <body>
        <header class="page-header">@include('partials.headernav')</header>

        <main>
            <div class="container">@yield('content')</div>
        </main>

        <footer>
            @include('partials.footernav')
        </footer>
    </body>
</html>
