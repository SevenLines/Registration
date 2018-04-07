@extends("layouts.app")

@section("content")
    @include("partials.yandex")
    @include("partials.google")
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <div class="container">
        @include("partials.contacts")
        @yield('body_content')
        <hr>
        @include("partials.contacts")
    </div>

    <div style="text-align: center; padding-bottom: 2em">Мосрвп.рф &mdash; Все права защищены. &copy; {{date("Y")}} <br>
    Копирование и любое коммерческое использование материалов сайта МосРВП.рф допускается только с письменного разрешения администрации ресурса</div>

    @include("partials.phone")
    @include("partials.form")
    @include("partials.privacy")
@endsection
