@extends("layouts.app")

@section("content")
    @include("partials.yandex")
    @include("partials.google")
    <link rel="stylesheet" href="{{ asset("css/main.css") }}">
    <link rel="stylesheet" href="{{ asset("css/mosrvp.css") }}">
    <div class="container header-contacts">
        <div class="header-contacts-inner">
            <div class="header-left-nav">
                <a class="header-contacts-brand" href="/">МОСРВП.РФ</a>
                <div class="header-contacts-price-list" href="#">
                    <i class="icon-price" style="font-size: 22px"></i>
                    <a href="/services/all">Прайс-лист</a>
                </div>
                <div class="header-contacts-time">
                    <small>Ежедневно</small>
                    <br>{{\Settings::get("working_time")}}
                </div>
            </div>
            <div class="header-contacts-contacts">
                <a class="header-contacts-phone" href="tel:{{\Settings::get("phone")}}">{{\Settings::get("phone")}}</a>
                <button class="header-contacts-callback btn btn-info" data-toggle="modal" href="#phone-modal">
                    ОБРАТНЫЙ ЗВОНОК
                </button>
            </div>
        </div>
    </div>
    <!--</nav>-->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <div class="" style="display: flex;  width: 100%; align-items:center">
                <div class="navbar-nav-custom">
                    <a class="nav-item nav-link d-block d-sm-none" href="/services/all">
                        <i class="icon-price" style="font-size: 22px"></i> Прайс-лист
                    </a>
                    @foreach ($services as $record)
                        @if ($loop->index < 3)
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
                    <div class="items-wrapper">
                        <div class="items">
                            <span class="article-header nav-item nav-link">Услуги</span>
                            @foreach ($services as $record)
                                <a href="/services/{{$record->alias}}" class="nav-item nav-link"
                                   href="#">{{ $record->title  }}</a>
                            @endforeach
                        </div>
                        @if($articles->count() > 0)
                            <div class="items articles-items">
                                <span class="article-header nav-item nav-link">Статьи</span>
                                @foreach($articles as $article)
                                    <a href="/articles/{{$article->id}}"
                                       class="nav-item nav-link">{{$article->title}}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="content">
        @yield("body_content")
        <section class="section-address">
            <div class="container-fluid">
                <div class="row">
                    <div class="address col-lg-4 col-md-6">
                        <div>
                            <h2>Как нас найти</h2>

                            <p></p>
                            <strong>Адрес</strong><br>
                            {{\Settings::get("full_address")}}
                            <br>

                            <p></p>
                            <strong>Телефон</strong><br>
                            <a style="color: white"
                               href="tel:{{\Settings::get("phone")}}">{{\Settings::get("phone")}}</a><br>

                            <p></p>
                            <strong>Email</strong><br>
                            <span><a style="color: white"
                                     href="mail:{{\Settings::get("email")}}">{{\Settings::get("email")}}</a></span><br>
                        </div>
                    </div>
                    <div class="map col-lg-4 col-md-6" style="padding: 0;padding-right: 1px">
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
            </div>
        </section>
        <section class="section-footer">
            <div class="container">
                <div class="row">
                    <div class="contacts">
                        <h2>мосрвп.рф</h2>
                        <div class="phone-info">
                            <a class="phone" href="tel:{{\Settings::get("phone")}}">{{\Settings::get("phone")}}</a>
                            <div>
                                <button class="btn btn-info btn-callback" data-toggle="modal" href="#phone-modal">
                                    ОБРАТНЫЙ ЗВОНОК
                                </button>
                            </div>
                        </div>
                        <div class="btn-group contact-links">
                            <a class="btn btn-link" style="color: #25d366"
                               href="https://api.whatsapp.com/send?phone=+79264243334">
                                <i class="fab fa-2x fa-whatsapp"></i>
                            </a>
                            <a class="btn btn-link" style="color:#8f5db7" href="viber://add?number=79264243334">
                                <i class="fab fa-2x fa-viber"></i>
                            </a>
                            <a class="btn btn-link" style="color: #5f8cd8"
                               href="https://www.facebook.com/profile.php?id=100025110527652">
                                <i class="fab fa-2x fa-facebook"></i>
                            </a>
                            <a class="btn btn-link" style="color: white" href="https://vk.com/public163939009">
                                <i class="fab fa-2x fa-vk"></i>
                            </a>
                            <a class="btn btn-link" style="color: #0088cc" href="tg://resolve?domain=79264243334">
                                <i class="fab fa-2x fa-telegram"></i>
                            </a>
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
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include("partials.phone")
    @include("partials.form")
    @include("partials.privacy")

    <script>
        $(function () {
            let $el = $(".navbar-menu");
            $(".navbar-menu .navbar-nav-hamburger").click(function () {
                $el.toggleClass("open");
            });
            $(document).mouseup(function (e) {
                if (!$el.is(e.target) && $el.has(e.target).length === 0) {
                    $el.removeClass("open");
                }
            });
        })
    </script>
@endsection
