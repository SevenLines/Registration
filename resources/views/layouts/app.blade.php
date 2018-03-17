<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="yandex-verification" content="ac2caca962751b55" />
    <meta name="description" content="Компания МосРвп поможет в любом миграционном вопросе! Привлекательные цены. Индивидуальный подход. Гражданство, патент, РВП, ВНЖ, сертификат о знании русского языка истории России и основ законодательства, медкомиссия, страховка. Соберем необходимый пакет документов. Опыт более 10 лет! Профессиональные сотрудники. Удобное расположение. Работаем в Москве и во всех городах Московсой области.">

    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.1/jquery.form.min.js"
            integrity="sha384-tIwI8+qJdZBtYYCKwRkjxBGQVZS3gGozr3CtI+5JF/oL1JmPEHzCEnIKbDbLTCer"
            crossorigin="anonymous"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    <title>@yield('title', 'Мосрвп.рф - Юридическая помощь')</title>

{{--<!-- Fonts -->--}}
{{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}

<!-- Styles -->

</head>
<body>
    @yield('content')
</body>
</html>
