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
    @include("partials.phone")
    @include("partials.form")
    @include("partials.privacy")
@endsection
