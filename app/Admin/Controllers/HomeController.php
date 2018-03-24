<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
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

                $row->column(6, function (Column $column) {
                    $settings = \Settings::all();

                    $form = new \Encore\Admin\Widgets\Form();
                    $form->method("post");
                    $form->text("address", "Адрес")->default($settings["address"] ?? '');
                    $form->text("full_address", "Полный адрес")->default($settings["full_address"] ?? '');
                    $form->text("phone", "Телефон")->default($settings["phone"] ?? '');
                    $form->textarea("description", "Описание")->default($settings["description"] ?? '');
                    $form->textarea("keywords", "Ключевые слова")->default($settings["keywords"] ?? '');
                    $form->hidden('_token')->default(csrf_token());

                    $form->email("email", "Почта")->default($settings["email"] ?? '');
                    $form->text("working_time", "Рабочее время")->default($settings["working_time"] ?? '');
                    $form->text("yandex_analytics", "ID яндекс аналитки")->default($settings["yandex_analytics"] ?? '');
                    $form->text("google_analytics", "ID google аналитки")->default($settings["google_analytics"] ?? '');

                    $column->append((new Box("Настройки", $form))->style('success'));
                });
                $row->column(3, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(3, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
        });
    }


    public function updateSettings(Request $request)
    {
        $data = $request->all();

        \Settings::set("address", $data["address"]);
        \Settings::set("full_address", $data["full_address"]);
        \Settings::set("phone", $data["phone"]);
        \Settings::set("description", $data["description"]);
        \Settings::set("keywords", $data["keywords"]);
        \Settings::set("email", $data["email"]);
        \Settings::set("working_time", $data["working_time"]);
        \Settings::set("yandex_analytics", $data["yandex_analytics"]);
        \Settings::set("google_analytics", $data["google_analytics"]);

        \Settings::save();
    }
}
