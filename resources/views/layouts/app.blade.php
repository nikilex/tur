<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Туристическое агентство "Спутник"</title>

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('header')
    <link href="{{ asset('css/style6.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">

</head>

<body>


    <div class="container-fluid p-0 m-0">
        @include('layouts.nav')
        @yield('content')
        @include('layouts.footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/b090962f09.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    @yield('footer')
    <script>
        $('#send').click(function() {
            if (!grecaptcha.getResponse()) {
                alert('Вы не заполнили поле Я не робот!');
                return false; // возвращаем false и предотвращаем отправку формы
            }
        })
    </script>
</body>

</html>