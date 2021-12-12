<!doctype html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body >
    <header>
        @include('includes.header')
    </header>

    <main >
        @yield('content')
    </main>

    
    @include('includes.footer')

</body>

</html>
