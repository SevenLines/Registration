@extends('layouts.client')

@section("title", $service->title.' - Мосрвп.рф - Юридическая помощь')
@section("body_content")
    <hr style="margin-bottom: 0.25em">
    <a class="btn btn-warning" href="/">К списку услуг</a>
    <hr style="margin-top: 0.25em">
    @include("partials.counter")
    <hr>
    <div class="service-content">
        {!!$service->description!!}
        <p></p>
        @if(count($service->subServices) > 0)
        <div style="width: 100%; overflow: scroll; overflow-y: hidden; overflow-x: auto">
            <table class="table table-bordered table-striped table-hover service-table">
                <tr>
                    <th>Наименование услуги</th>
                    <th>Цена</th>
                    <th>Список документов</th>
                </tr>
                @foreach($service->subServices as $s)
                    <tr>
                        <td>{{$s->title}}</td>
                        <td class="service-table-price">
                            {{$s->price}}
                        </td>
                        <td>
                            <ul>
                                @foreach($s->documentsList as $d)
                                    <li>{{$d}}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach()
            </table>
        </div>
        @endif
    </div>
    <hr style="margin-top: 0.25em">
    <a class="btn btn-warning" href="/">К списку услуг</a>
    <hr>
    <h3>Мы находимся по адресу: <strong>Метро Партизанская. Измайловское шоссе д. 71 корп. 4г-д</strong></h3>

@endsection()