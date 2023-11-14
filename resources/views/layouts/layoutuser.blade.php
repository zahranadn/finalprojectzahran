<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    @include('includes.styleuser')
</head>

<body>
    @include('includes.navbaruser')
    @yield('content')
    <main></main>
    @include('includes.footeruser')
    @include('includes.scriptuser')
  
</body>

</html>