@extends('layouts.client')

@section("title", $article->title)

@section("body_content")
    <section>
        <div class="container">
            <div class="row" style="padding: 1em 0">
                <div class="col">
                    {!! $article->text  !!}
                </div>
            </div>
        </div>
    </section>
@endsection()