<!doctype html>
<html lang="en">
<head>
    <title>@yield('title','Sample App')--for zhuli</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
@include('layouts._header')

<div class="container">
    @yield('content')
    @include('layouts._footer')
</div>
</body>
</html>
