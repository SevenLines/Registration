@extends('layouts.client')

@section("body_content")
    @include("partials.header")
    @include("partials.counter")
    <hr>

    <div class="documents-list">
        @foreach ($services as $record)
            <a href="/services/{{$record->alias}}" class="document-item col-md-3 col-sm-4 col-xs-6">
                <div class="inner">
                    <img src={{ asset($record->imageUrl) }} alt="">
                    <div class="description">{{ $record->title  }}</div>
                </div>
            </a>
        @endforeach
        <div class="clearfix"></div>
    </div>

    <div class="location-info">
        <hr>

        <div class="row" >
            <div class="col-md-6 col-sm-12 col-xs-12 map">
                @if(\Settings::get("yandex_map")){!!\Settings::get("yandex_map")!!}@endif
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 image">
                @if(\Settings::get("address_image"))
                    <img src="/uploads/{{\Settings::get("address_image")}}"  alt="{{\Settings::get("full_address")}}">
                @endif
            </div>
        </div>
        <h3>Мы находимся по адресу: <strong>{{\Settings::get("full_address")}}</strong></h3>

    </div>
@endsection()