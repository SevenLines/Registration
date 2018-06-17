@extends('layouts.client')

@section("body_content")
    <section class="services-all">
        <div class="container">
            <div class="services">
                @foreach($services as $service)
                    <a class="btn btn-danger" href="/services/{{$service->alias}}">{{$service->title}}</a>
                    <div style="width: 100%; overflow: scroll; overflow-y: hidden; overflow-x: auto">
                        <table class="table table-bordered table-striped table-hover service-table">
                            <tr>
                                <th>Наименование услуги</th>
                                <th style="width: 15%">Цена</th>
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
                @endforeach()
            </div>
        </div>
    </section>
@endsection()