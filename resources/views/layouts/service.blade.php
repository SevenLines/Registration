@extends('layouts.client')

@section("body_content")
    <hr style="margin-bottom: 0.25em">
    <a class="btn btn-warning" href="/">Вернутся на главную страницу</a>
    <hr  style="margin-top: 0.25em">
    @include("partials.counter")
    <hr>
    <div class="service-content">
    @yield('service_content')
    </div>
@endsection()