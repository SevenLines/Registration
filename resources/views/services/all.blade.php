@extends('layouts.client')

@section("body_content")
    <style>
        a {
            text-decoration: underline;
        }
    </style>
    <hr style="margin-bottom: 0.25em">
    <a class="btn btn-warning" href="/">К списку услуг</a>
    <hr style="margin-top: 0.25em">
    @include("partials.counter")
    <hr>
    <div class="service-content">
        @yield('service_content')
        <p></p>
        @foreach($services as $service)
            <a href="/services/{{$service->alias}}"><h2>{{$service->title}}</h2></a>
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
        @endforeach()
    </div>
    <hr style="margin-top: 0.25em">
    <a class="btn btn-warning" href="/">К списку услуг</a>
@endsection()