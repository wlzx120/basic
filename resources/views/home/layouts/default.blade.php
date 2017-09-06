<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Sample App') - Laravel </title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

@include('home.layouts._header')

<div class="container">
    @yield('content')
    @include('home.layouts._footer')
</div>

</body>
</html>