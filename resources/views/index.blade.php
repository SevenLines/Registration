@extends('layouts.client')

@section("body_content")
    <section class="section-1">
        <div class="container">
            <div class="row">
                <h1>МИГРАЦИОННЫЕ УСЛУГИ</h1>
                <div class="description-wrapper">
                    <div class="description">
                        <div class="description-dash">&mdash;</div>
                        <div class="description-text">
                            Профессиональная юридическая помощь <br>
                            иностранным гражданам в оформлении <br>
                            официальных документов для пребывания <br>
                            в России.
                        </div>

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
                    <div>
                        <span class="highlighted">Самые низкие цены</span> в Москве и Московской области
                    </div>
                    <div>
                        Выберите услугу - и мы <br>немедленно вам поможем
                    </div>
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
                            Вам не придётся вникать в юридические аспекты – мы решим ваши проблемы прозрачно и
                            честно.
                            подготовим любые недостающие документы. поможем на любом этапе легализации. Ваши данные
                            в
                            полной безопасности. Самые низкие цены в москве и московской области. Выберите услугу –
                            и мы
                            немедленно вам поможем
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
        <div class="buttons">
            <div class="btn-round">
                <span class="">&lt;</span>
            </div>
            <div class="btn-round">
                <span class="">&gt;</span>
            </div>
        </div>
        <div class="items">
            <div class="item">
                <img src="images/Layer%2031.png" alt="">
                <div class="item-title">Сертификат/тестирование</div>
            </div>
            <div class="item">
                <div class="item-title">РВП</div>
                <img src="images/Layer%2032.png" alt="">
            </div>
            <div class="item">
                <div class="item-title">ВНЖ</div>
                <img src="images/Layer%2033.png" alt="">
            </div>
            <div class="item">
                <div class="item-title">Гражданство</div>
                <img src="images/Layer%2034.png" alt="">
            </div>
            <div class="item">
                <div class="item-title">Патент</div>
                <img src="images/Layer%2035.png" alt="">
            </div>
        </div>
        <div class="buttons">
        <div class="btn-round">
        <span class="">&lt;</span>
        </div>
        <div class="btn-round">
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
                            Мы работаем честно и добросовестно. Профессиональное *оказание миграционных услуг*
                            осуществляем с помощью исключительно легальных средств и способов. Наши юристы работают,
                            руководствуясь только действующим законодательством РФ, и поэтому выполняют заказы
                            доверителей в кратчайшие сроки. Даже в самых запутанных миграционных ситуациях мы всегда
                            побеждаем!
                        </div>
                    </div>
                    <div class="col-md-6 item item-guard">
                        <h3>Безопасно</h3>
                        <div>
                            Наш *центр миграционных услуг* «МосРВП» сотрудничает с клиентами на основе письменного
                            договора, имеющего правовое обоснование. Обратившиеся к нам доверители могут не
                            беспокоиться: их деньги не пропадут, и документы будут оформлены согласно действующим
                            законам Российской Федерации.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 item item-cash">
                        <h3>Выгодно</h3>
                        <div>
                            МЦ «МосРВП» оказывает *миграционные услуги в Москве,* предлагая своим доверителям наиболее
                            выгодные варианты решения проблем. Наш индивидуальный подход к каждому клиенту и гибкая
                            система формирования цен позволяет подобрать для вас недорогой способ официального
                            оформления документов. Вы будете довольны ценовой доступностью наших услуг!
                        </div>
                    </div>
                    <div class="col-md-6 item item-secure">
                        <h3>Конфинденциально</h3>
                        <div>
                            Мы гарантируем обеспечение конфиденциальности всей информации, которую нам предоставляют
                            заказчики наших услуг. Обязуемся использовать полученные сведения только для оказания
                            юридической помощи в рамках договора.
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
@endsection()