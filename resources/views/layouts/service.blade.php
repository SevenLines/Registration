@extends('layouts.client')

@section("title", $service->header_title)

@section("meta_description")
    @if($service->meta_description){{$service->meta_description}}@else{{\Settings::get("description")}}@endif
@endsection

@section("meta_keywords")
    @if($service->meta_keywords){{$service->meta_keywords}}@else{{\Settings::get("keywords")}}@endif
@endsection

@section("body_content")
    <section class="section-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="image">
                    <img src="{{$service->imageUrl}}" alt="">
                </div>
                <div class="description2">
                    <div class="title-breadcrumb d-none d-md-block">Главная <i class="fa fa-chevron-right"></i> Услуги <i class="fa fa-chevron-right"></i> {{$service->title}}</div>
                    <div class="title">{{$service->title}}</div>
                    <div class="short-description">
                       {{$service->small_description}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-info">
        <div class="container">
            <div class="row">
                <div class="text">
                    <div class="discount">
                        <div class="discount-sum">{{$service->discount}}</div>
                        <div class="discount-text">
                            отправьте заявку прямо сейчас <br>
                            и получите скидку на наши услуги
                        </div>
                    </div>

                    <div class="service-items">
                        @foreach($service->subServices as $s)
                            <div class="item">
                                <div class="item-info">
                                    <div class="item-description">
                                        {{$s->title}}
                                    </div>
                                    <div class="item-button">
                                        <button class="btn btn-danger" data-toggle="modal" href="#phone-modal">ОСТАВИТЬ ЗАЯВКУ</button>
                                    </div>
                                </div>
                                <div class="item-sum">
                                    {{--<div class="small">от</div>--}}
                                    {{$s->price}}
                                    {{--<div class="small">руб</div>--}}
                                </div>
                            </div>
                        @endforeach()
                    </div>

                    <div class="documents-inner">
                        <div class="documents-icon">
                            <i class="icon-document-2"></i>
                        </div>
                        <h3>Список документов</h3>
                        <div class="documents-items">
                            @foreach($service->subServices as $s)
                                @if($loop->index == 0)
                                    @foreach($s->documentsList as $d)
                                        <div class="documents-item">{{$d}}</div>
                                    @endforeach
                                @endif
                            @endforeach()
                        </div>
                    </div>

                    <div class="content">
                        {!!$service->description!!}
                    </div>

                </div>
                <div class="container-offset">
                    <div class="documents">
                        <div class="documents-icon">
                            <i class="icon-document-2"></i>
                        </div>
                        <h3>Список документов</h3>
                        <div class="documents-items">
                            @foreach($service->subServices as $s)
                                @if($loop->index == 0)
                                    @foreach($s->documentsList as $d)
                                        <div class="documents-item">{{$d}}</div>
                                    @endforeach
                                @endif
                            @endforeach()
                        </div>
                    </div>

                    <div class="form">
                        <form action="{{ route("addquery") }}" method="POST" role="form">
                            <h3>Бесплатная<br>консультация</h3>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Ваше имя" required>
                                <input type="text" name="phone" class="form-control" placeholder="E-mail или телефон" required>
                            </div>
                            <button class="btn btn-primary" type="submit" onclick="reachGoal('order'); return true;">Отправить</button>
                            <small>
                                Нажимая «Отправить заявку» вы подтверждаете, что ознакомлены с Политикой конфиденциальности
                                и
                                даете свое согласие на сбор и обработку персональных данных.
                            </small>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    {{--<hr style="margin-bottom: 0.25em">--}}
    {{--<a class="btn btn-warning" href="/">К списку услуг</a>--}}
    {{--<hr style="margin-top: 0.25em">--}}
    {{--@include("partials.counter")--}}
    {{--<hr>--}}
    {{--<div class="service-content">--}}
    {{--{!!$service->description!!}--}}
    {{--<p></p>--}}
    {{--</div>--}}
    {{--<hr style="margin-top: 0.25em">--}}
    {{--<a class="btn btn-warning" href="/">К списку услуг</a>--}}
    {{--<hr>--}}
    {{--<h3>Мы находимся по адресу: <strong>Метро Партизанская. Измайловское шоссе д. 71 корп. 4г-д</strong></h3>--}}

@endsection()