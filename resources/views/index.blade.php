@extends('layouts.client')

@section("body_content")
    <section class="section-1">
        <div class="container">
            <div class="row">
                <h1>МИГРАЦИОННЫЕ УСЛУГИ</h1>
                <div class="description-wrapper">
                    <div class="description">
                        <div class="description-dash">&mdash;</div>
                        <div class="description-text">{!!\Settings::get('index_text_section_1')!!}</div>

                    </div>
                </div>
                <div class="items" style="">
                    <div class="row">
                        <i class="icon-bullseye"></i>
                        <!--<img src="images/bulleye.png" alt="">-->
                        <div class="info">100% ГАРАНТИЯ РЕЗУЛЬТАТА</div>
                    </div>
                    <div class="row">
                        <i class="icon-timer"></i>
                        <!--<img src="images/timer.png" alt="">-->
                        <div class="info">КОРОТКИЕ СРОКИ</div>
                    </div>
                    <div class="row">
                        <i class="icon-call"></i>
                        <div class="info">БЕСПЛАТНАЯ КОСУЛЬТАЦИЯ</div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="section-2">
        <div class="container">
            <div class="row">
                <div class="services">
                    <a href="services/sertificat" class="service">
                        <i class="icon-diplom"></i>
                        <div class="label">
                            сертификат <br>
                            /тестирование
                        </div>
                    </a>
                    <a href="services/rvp" class="service">
                        <i class="icon-document"></i>
                        <div class="label">
                            разрешение <br>
                            на временное <br>
                            проживание
                        </div>
                    </a>
                    <a href="services/vng" class="service">
                        <i class="icon-time"></i>
                        <div class="label">
                            вид <br>
                            на жительство
                        </div>
                    </a>
                    <a href="services/grazhdanstvo" class="service">
                        <i class="icon-passport"></i>
                        <div class="label">
                            гражданство
                        </div>
                    </a>
                </div>
                <div class="description">
                    {!! \Settings::get("index_text_section_2") !!}
                </div>
            </div>
        </div>
    </section>
    <section class="section-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <h2>Миграционные<br>услуги</h2>
                    <div class="description">
                        {{--<div class="description-dash">--}}
                        {{--<div class="description-dash-symbol"></div>--}}
                        {{--</div>--}}
                        <div class="description-text">
                            {!! \Settings::get("index_text_section_3")!!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-sm-12">
                    <div class="form">
                        <form action="{{ route("addquery") }}" method="POST" role="form">
                            <h3>ОТПРАВЬТЕ ЗАЯВКУ ПРЯМО СЕЙЧАС И ПОЛУЧИТЕ СКИДКУ НА НАШИ УСЛУГИ!</h3>
                            <div class="form-group">
                                <input type="text" required="required" name="name" class="form-control"
                                       placeholder="Ваше имя">
                                <input type="text" required="required" name="phone" class="form-control"
                                       placeholder="E-mail или телефон">
                            </div>
                            <button type="submit" onclick="reachGoal('order'); return true;"
                                    class="btn btn-info float-right">Оставить заявку
                            </button>
                            <small>
                                Нажимая «Оставить заявку» вы подтверждаете, что ознакомлены с
                                <a class="privacy-link" data-toggle="modal" href="#modal-privacy"
                                   style="color: white; text-decoration: underline">Политикой конфиденциальности</a>
                                и даете свое согласие на сбор и обработку персональных данных.
                            </small>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-4">
        <h2>Все наши услуги</h2>
        <div class="buttons" style="margin-top: 2em">
            <div class="btn-round btn-previous">
                <span class="">&lt;</span>
            </div>
            <div class="btn-round btn-next">
                <span class="">&gt;</span>
            </div>
        </div>
        <div class="items">
            @foreach($sorted_services as $s)
                <a class="item" href="/services/{{$s->alias}}" >
                    <img src="{{$s->imageUrl}}" alt="">
                    <div class="item-title">{{$s->title}}</div>
                </a>
            @endforeach
        </div>
        <div class="buttons">
            <div class="btn-round btn-previous">
                <span class="">&lt;</span>
            </div>
            <div class="btn-round btn-next">
                <span class="">&gt;</span>
            </div>
        </div>
    </section>
    <section class="section-5 d-none d-md-block">
        <div class="container">
            <h2>Наши принципы</h2>
            <div class="items">
                <div class="row">
                    <div class="col-md-6 item item-durable">
                        <h3>Надежно</h3>
                        <div>
                            {!!\Settings::get("index_text_durability")!!}
                        </div>
                    </div>
                    <div class="col-md-6 item item-guard">
                        <h3>Безопасно</h3>
                        <div>
                            {!! \Settings::get("index_text_security") !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 item item-cash">
                        <h3>Выгодно</h3>
                        <div>
                            {!!\Settings::get("index_text_cash") !!}
                        </div>
                    </div>
                    <div class="col-md-6 item item-secure">
                        <h3>Конфинденциально</h3>
                        <div>
                            {!! \Settings::get("index_text_secure") !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--@include("partials.header")--}}
    {{--@include("partials.counter")--}}
    {{--<hr>--}}

    {{--<div class="documents-list">--}}
    {{--@foreach ($services as $record)--}}
    {{--<a href="/services/{{$record->alias}}" class="document-item col-md-3 col-sm-4 col-xs-6">--}}
    {{--<div class="inner">--}}
    {{--<img src={{ asset($record->imageUrl) }} alt="">--}}
    {{--<div class="description">{{ $record->title  }}</div>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--@endforeach--}}
    {{--<div class="clearfix"></div>--}}
    {{--</div>--}}

    {{--<div class="location-info">--}}
    {{--<hr>--}}

    {{--<div class="row" >--}}
    {{--<div class="col-md-6 col-sm-12 col-xs-12 map">--}}
    {{--@if(\Settings::get("yandex_map")){!!\Settings::get("yandex_map")!!}@endif--}}
    {{--</div>--}}
    {{--<div class="col-md-6 col-sm-12 col-xs-12 image">--}}
    {{--@if(\Settings::get("address_image"))--}}
    {{--<img src="/uploads/{{\Settings::get("address_image")}}"  alt="{{\Settings::get("full_address")}}">--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<h3>Мы находимся по адресу: <strong>{{\Settings::get("full_address")}}</strong></h3>--}}

    {{--</div>--}}
    <script>
        $(function () {
            let $el = $(".section-4 .items");
            $(".section-4 .buttons .btn-next").click(function () {
                let width = $el.find(".item").width() + 8;
                $el.animate({
                    scrollLeft: Math.floor(($el.scrollLeft() + width) / width) * width
                }, 100)
            });
            $(".section-4 .buttons .btn-previous").click(function () {
                let width = $el.find(".item").width() + 8;
                $el.animate({
                    scrollLeft: Math.floor(($el.scrollLeft() - width) / width) * width
                }, 100)
            })
        })
    </script>
@endsection()