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
@endsection()