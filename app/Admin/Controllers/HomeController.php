<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form\Field\Image;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('Админка');

            $content->row(function (Row $row) {

                $row->column(9, function (Column $column) {
                    $settings = \Settings::all();

                    $form = new \Encore\Admin\Widgets\Form($settings);
                    $form->method("post");

                    $form->text("address", "Адрес");
                    $form->text("full_address", "Полный адрес");
                    $form->image("address_image", "Картинка для адреса")->move("images/settings")->uniqueName();
                    $form->text("yandex_map", "Яндекс карта");
                    $form->html('<a href="https://yandex.ru/map-constructor/?from=maps_login" target="_blank">Конструктор яндекс карт</a><small> [при генерации карты ставьте галку "Растянуть по ширине", вставьте сгенеренный код в поле выше]</small>');

                    $form->text("phone", "Телефон");
                    $form->textarea("description", "Описание");
                    $form->textarea("keywords", "Ключевые слова");
                    $form->hidden('_token')->default(csrf_token());

                    $form->email("email", "Почта");
                    $form->text("working_time", "Рабочее время");
                    $form->text("yandex_analytics", "ID яндекс аналитки");
                    $form->text("google_analytics", "ID google аналитки");

                    $column->append((new Box("Настройки", $form))->style('success'));
                });
                $row->column(3, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

            });
        });
    }


    public function updateSettings(Request $request)
    {
        $data = $request->all();

        $imageField = new Image('image');
        $imageField->move("images/settings")->uniqueName();

        \Settings::set("address", $data["address"]);
        \Settings::set("full_address", $data["full_address"]);
        \Settings::set("phone", $data["phone"]);
        \Settings::set("description", $data["description"]);
        \Settings::set("keywords", $data["keywords"]);
        \Settings::set("email", $data["email"]);
        \Settings::set("working_time", $data["working_time"]);
        \Settings::set("yandex_analytics", $data["yandex_analytics"]);
        \Settings::set("yandex_map", $data["yandex_map"]);

        if (array_key_exists("address_image", $data)) {
            \Settings::set("address_image", $imageField->prepare($data["address_image"]));
        }

        \Settings::set("google_analytics", $data["google_analytics"]);

        \Settings::save();
    }
}
