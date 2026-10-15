<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'omid norouzi | wordpress developer')</title>

    @stack('head')

</head>


<body>

    @hasSection('nav')
        @yield('nav')
    @else
        @include('partials.nav-main')
    @endif


    @yield('content')


    @stack('scripts')

</body>

</html>
