<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $__env->yieldContent('title') }}</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    @yield('content')
</body>

</html>