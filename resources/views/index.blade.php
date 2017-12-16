@extends('layouts.client')

@section("body_content")
    @include("partials.header")
    @include("partials.counter")
    <hr>

    <div class="documents-list">
        @foreach ($services as $record)
            <a @if(property_exists($record, "alias"))href="/services/{{$record->alias}}"@endif() class="document-item col-md-3 col-sm-4 col-xs-6">
                <div class="inner">
                    <img src={{ asset($record->image) }} alt="">
                    <div class="description">{{ $record->title  }}</div>
                </div>
            </a>
        @endforeach
        <div class="clearfix"></div>
    </div>

    <div class="location-info">
        <hr>
        <h3>Мы находимся по адресу: <strong>Метро Партизанская. Измайловское шоссе д. 71 корп. 4г-д</strong></h3>

        <div class="row" >
            <div class="col-md-6 col-sm-12 col-xs-12 map">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ac18bbc274ebb1de17aced62dea0c0d22a291e104fd74c7a8a56660f734b98ac4&amp;width=100%25&amp;height=518&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 image">
                <img src="{{asset("images/image_location_2_small_arrow_with_name.JPG")}}"  alt="">
                <img src="{{asset("images/image_location_1_small_arrow.JPG")}}"  alt="">
            </div>
        </div>

    </div>
@endsection()