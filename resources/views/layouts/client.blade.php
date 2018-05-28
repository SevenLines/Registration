@extends("layouts.app")

@section("content")
    @include("partials.yandex")
    @include("partials.google")
    <link rel="stylesheet" href="{{ asset("css/main.css") }}">
    <link rel="stylesheet" href="{{ asset("css/mosrvp.css") }}">
    <div class="container header-contacts">
        <div class="header-contacts-inner">
            <div style="flex-grow: 7;display: flex;justify-content: space-between;align-items: center;">
                <a class="header-contacts-brand" href="/">МОСРВП.РФ</a>
                <div class="header-contacts-price-list" href="#">
                    <i class="icon-price" style="font-size: 22px"></i>
                    <span>Прайс-лист</span>
                </div>
                <div class="header-contacts-time">
                    <small>Ежедневно</small>
                    <br>с 09-00 до 21-00
                </div>
            </div>
            <div class="header-contacts-contacts">
                <div class="header-contacts-phone">+7 926 424 3334</div>
                <button class="header-contacts-callback btn btn-info">ОБРАТНЫЙ ЗВОНОК</button>
            </div>
            <div class="header-contacts-language-button" style="">
                <div class=" btn-round-sm btn-round"></div>
            </div>
        </div>
    </div>
    <!--</nav>-->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <div class="" style="display: flex;  width: 100%; align-items:center">
                <div class="navbar-nav-custom">
                    @foreach ($services as $record)
                        @if ($loop->index < 2)
                            <a href="/services/{{$record->alias}}" class="nav-item nav-link "
                               href="#">{{ $record->title  }}</a>
                        @elseif ($loop->index < 3)
                            <a href="/services/{{$record->alias}}" class="nav-item nav-link d-none d-sm-block"
                               href="#">{{ $record->title  }}</a>
                        @elseif ($loop->index < 4)
                            <a href="/services/{{$record->alias}}" class="nav-item nav-link d-none d-md-block"
                               href="#">{{ $record->title  }}</a>
                        @elseif ($loop->index < 7)
                            <a href="/services/{{$record->alias}}" class="nav-item nav-link d-none d-lg-block"
                               href="#">{{ $record->title  }}</a>
                        @endif
                    @endforeach
                </div>
                <div class="navbar-menu">
                    <div class="navbar-nav-hamburger">
                        <i class="fas fa-bars fa-2x"></i>
                    </div>
                    <div class="items">
                        @foreach ($services as $record)
                            <a href="/services/{{$record->alias}}" class="nav-item nav-link"
                               href="#">{{ $record->title  }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="content">
        @yield("body_content")
        <section class="section-address">
            <div class="row">
                <div class="address col-lg-4 col-md-6">
                    <div>
                        <h2>Как нас найти</h2>

                        <p></p>
                        <strong>Адрес</strong><br>
                        <span>Измайловское шоссе д. 71 корп. 4г-д
                    <br>(Метро Партизанская)</span><br>

                        <p></p>
                        <strong>Телефон</strong><br>
                        <span>+7 926 424 3334</span><br>

                        <p></p>
                        <strong>Email</strong><br>
                        <span>mosrvp77@gmail.com</span><br>
                    </div>
                </div>
                <div class="map col-lg-4 col-md-6">
                    @if(\Settings::get("yandex_map")){!!\Settings::get("yandex_map")!!}@endif
                </div>
                <div class="address-image col-lg-4 col-md-12">
                    <div class="row">
                        @if(\Settings::get("address_image"))
                            <img src="/uploads/{{\Settings::get("address_image")}}"
                                 alt="{{\Settings::get("full_address")}}">
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section class="section-footer">
            <div class="container">
                <div class="row">
                    <div class="contacts">
                        <h2>мосрвп.рф</h2>
                        <div class="phone-info">
                            <div class="phone">+7 926 424 3334</div>
                            <div>
                                <button class="btn btn-info btn-callback">ОБРАТНЫЙ ЗВОНОК</button>
                            </div>
                        </div>
                    </div>
                    <div class="services">
                        <div class="services-title">
                            <h3>услуги</h3>
                            <div class="line"></div>
                        </div>
                        <ul>
                            @foreach ($services as $record)
                                <li class="services-item">
                                    <a href="/services/{{$record->alias}}" href="#">{{ $record->title  }}</a>
                                </li>
                            @endforeach
                            {{--<li class="services-item">СЕРТИФИКАТ ТЕСТИРОВАНИЕ</li>--}}
                            {{--<li class="services-item">РВП</li>--}}
                            {{--<li class="services-item">ВНЖ</li>--}}
                            {{--<li class="services-item">ГРАЖДАНСТВО</li>--}}
                            {{--<li class="services-item">Патент</li>--}}
                            {{--<li class="services-item">Разрешение на работу</li>--}}
                            {{--<li class="services-item">Въезд/выезд</li>--}}
                            {{--<li class="services-item">Переводы</li>--}}
                            {{--<li class="services-item">Медицинская страховка/ДМС</li>--}}
                            {{--<li class="services-item">Медкомиссия</li>--}}
                            {{--<li class="services-item">Приглашения</li>--}}
                            {{--<li class="services-item">ИНН/СНИЛС</li>--}}
                            {{--<li class="services-item">Загранпаспорт</li>--}}
                            {{--<li class="services-item">Виза</li>--}}
                            {{--<li class="services-item">Уведомления ФМС</li>--}}
                        </ul>
                    </div>
                    <!--<div class="info">-->
                    <!--<h3>Информация</h3>-->
                    <!--<ul class="services">-->
                    <!--<li class="services-item">О компании</li>-->
                    <!--<li class="services-item">Статьи</li>-->
                    <!--<li class="services-item">Вопросы/Ответы</li>-->
                    <!--<li class="services-item">Контакты</li>-->
                    <!---->
                    <!--</ul>-->
                    <!--</div>-->
                </div>
            </div>
        </section>
    </div>
    {{--<div class="container">--}}
    {{--@include("partials.contacts")--}}
    {{--@yield('body_content')--}}
    {{--<hr>--}}
    {{--@include("partials.contacts")--}}
    {{--</div>--}}

    {{--<div style="text-align: center; padding-bottom: 2em">Мосрвп.рф &mdash; Все права защищены. &copy; {{date("Y")}} <br>--}}
    {{--Копирование и любое коммерческое использование материалов сайта МосРВП.рф допускается только с письменного разрешения администрации ресурса</div>--}}

    @include("partials.phone")
    @include("partials.form")
    @include("partials.privacy")
@endsection
