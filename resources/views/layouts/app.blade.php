<!DOCTYPE html>
<html lang="en-US">
<head>
    @include('partials.head')
    @include('partials.schema-local-business')
</head>
<body>

    @include('partials.preloader')

    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    @include('partials.scripts')

</body>
</html>
