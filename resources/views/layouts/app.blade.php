<!DOCTYPE html>
<html lang="en-US">
<head>
    @include('partials.head')
    @include('partials.schema-local-business')
    @include('partials.tracking-codes-head')
</head>
<body>

    @include('partials.tracking-codes-body')

    @include('partials.preloader')

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @include('partials.scripts')

    @include('partials.tracking-codes-footer')

</body>
</html>
