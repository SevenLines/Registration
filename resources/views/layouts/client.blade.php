@extends("layouts.app")

@section("content")
    @include("partials.yandex")
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <div class="container">
        @include("partials.contacts")
        @yield('body_content')
        <hr>
        @include("partials.contacts")
    </div>

    <div style="text-align: center; padding-bottom: 2em">Мосрвп.рф &mdash; Все права защищиены. &copy; {{date("Y")}}</div>

    @include("partials.phone")
    @include("partials.form")
    @include("partials.privacy")
@endsection
