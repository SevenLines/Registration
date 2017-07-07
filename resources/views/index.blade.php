<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset("css/app.css") }}">

</head>
<body>
<div class="container">
    <div class="email-phones">
        <div class="pull-left">
            <span><i class="glyphicon glyphicon-map-marker"></i> г. Москва</span>
        </div>
        <div class="pull-right">
            <span style="margin-right: 1em"><i class="glyphicon glyphicon-phone"></i>
                <a href="tel:+79264243334"> +7 926 424 3334</a>
            </span>
            <span>
                <i class="glyphicon glyphicon-envelope"></i>
                <a href="mailto:mosrvp77@gmail.com">mosrvp77@gmail.com</a>
            </span>
        </div>
        <div class="clearfix"></div>
    </div>
    <hr style="margin-bottom: 0.5em">
    <img src="images/herb.png" alt="" class="herb pull-right">
    <img src="images/herb.png" alt="" class="herb pull-left">
    <div class="header-info" style="">
        <div class="info">
            <div class="" style="text-align: center">
                <div class="title">Юридическая помощь</div>
                <div class="description">по миграционным вопросам <span class="highlight">подготовка всех документов</span> для иностранных граждан
                </div>
            </div>
        </div>
        <div class="" style="text-align: center">
            <div class="main_info">
                <div class="free">Бесплатная консультация</div>
                <small>самые <span class="highlight">низкие цены</span> в Москве и Московской
                    области!
                </small>
                <br>
                <small>Без посредников!</small>
            </div>
        </div>
    </div>
    <hr>

    <div style="text-align: center">
        <div class="sale-info">
            <div>Заполни заявку сейчас и получи <span class="highlight">СКИДКУ</span> на наши
                услуги!
            </div>
            <div style="margin-bottom: 0.5em">Торопись до конца акции осталось</div>
        </div>
        <div class="hidden-xs">
            <script src="http://megatimer.ru/s/b222fed4822727436eebfbbc7968bf29.js"></script>
        </div>
        <div class="hidden-lg hidden-md hidden-sm">
            <script src="http://megatimer.ru/s/f33f299374934a6f1aad76ed9dd07e95.js"></script>
        </div>
        <div style="padding-top: 2em">
            <form action="" method="POST" class="form-inline" role="form">
                <div class="form-group" >
                    <input type="text" class="index-phone form-control input-lg" placeholder="телефон">
                </div>

                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-lg btn-warning">
                            Оставить заявку
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="documents-list">
        <div class="document-item col-md-3 col-sm-4 col-xs-6">
            <div class="inner">
                <img src="images/Тестирование.jpg" alt="">
                <div class="description">Тестирование</div>
            </div>
        </div>
        <div class="document-item col-md-3 col-sm-4 col-xs-6">
            <div class="inner">
                <img src="images/Патент.jpg" alt="">
                <div class="description">ПАТЕНТ</div>
            </div>
        </div>
        <div class="document-item col-md-3 col-sm-4 col-xs-6">
            <div class="inner">
                <img src="images/Мед.страховка.jpg" alt="">
                <div class="description">Мед. Страховка</div>
            </div>
        </div>
        <div class="document-item col-md-3 col-sm-4 col-xs-6">
            <div class="inner">
                <img src="images/Разрешение на работу.jpg" alt="">
                <div class="description">Разрешение на работу</div>
            </div>
        </div>
        <div class="document-item col-md-3 col-sm-4 col-xs-6">
            <div class="inner">
                <img src="images/въезд;выезд.jpg" alt="">
                <div class="description">Въезд/выезд</div>
            </div>
        </div>
        <div class="document-item col-md-3 col-sm-4 col-xs-6">
            <div class="inner">
                <img src="images/РВП1.jpg" alt="">
                <div class="description">Рвп</div>
            </div>
        </div>
        <div class="document-item col-md-3 col-sm-4 col-xs-6">
            <div class="inner">
                <img src="images/ВНЖ.jpg" alt="">
                <div class="description">Внж</div>
            </div>
        </div>
        <div class="document-item col-md-3 col-sm-4 col-xs-6">
            <div class="inner">
                <img src="images/Гражданство.jpg" alt="">
                <div class="description">Гражданство</div>
            </div>
        </div>
        <div class="document-item col-md-3 col-sm-4 col-xs-6">
            <div class="inner">
                <img src="images/МедКомиссия.jpg" alt="">
                <div class="description">Мед.Комиссия</div>
            </div>
        </div>
        <div class="document-item col-md-3 col-sm-4 col-xs-6">
            <div class="inner">
                <img src="images/Загран.Паспорт.jpg" alt="">
                <div class="description">Загран.Паспорт</div>
            </div>
        </div>
        <div class="document-item col-md-3 col-sm-4 col-xs-6">
            <div class="inner">
                <img src="images/Виза.jpg" alt="">
                <div class="description">Виза</div>
            </div>
        </div>
        <div class="document-item col-md-3 col-sm-4 col-xs-6">
            <div class="inner">
                <img src="images/приглашение.jpg" alt="">
                <div class="description">Приглашение</div>
            </div>
        </div>
        <div class="document-item col-md-3 col-sm-4 col-xs-6">
            <div class="inner">
                <img src="images/ИНН.jpg" alt="">
                <div class="description">Получение Инн</div>
            </div>
        </div>
        <div class="document-item col-md-3 col-sm-4 col-xs-6">
            <div class="inner">
                <img src="images/УведомлениеФМС.jpg" alt="">
                <div class="description">Уведомление Фмс</div>
            </div>
        </div>

    </div>
</div>
@include("partials.phone")
</body>
</html>
