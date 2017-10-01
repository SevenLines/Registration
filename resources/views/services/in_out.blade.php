@extends("layouts.service")

@section("service_content")
    <h2>Выезд выезд</h2>

    <p></p>
    <table class="table table-bordered table-striped table-hover service-table">
        <tr>
            <th>Наименование услуги</th>
            <th>Список документов</th>
            <th>Цена</th>
        </tr>
        <tr>
            <td>
                Въезд-Выезд
            </td>
            <td>
                <ul>
                    <li>Паспорт</li>
                    <li>Миграционная карта</li>
                </ul>
            </td>
            <td class="service-table-price">
                от 2500 руб.
            </td>
        </tr>
    </table>
@endsection()