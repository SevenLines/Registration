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
                    $form->textarea("index_page_text", "Текст на главной странице");
                    $form->textarea("index_bordered_page_text", "Текст на главной странице в рамке");
                    $form->textarea("counter_text", "Текст над счетчиком");
                    $form->textarea("description", "Описание");
                    $form->text("meta_title", "Заголовок страницы");
                    $form->textarea("keywords", "Ключевые слова");
                    $form->hidden('_token')->default(csrf_token());

                    $form->email("email", "Почта");
                    $form->text("working_time", "Рабочее время");
                    $form->text("yandex_analytics", "ID яндекс аналитки");

                    $form->ckeditor("index_text_section_1", "index_text_section_1");
                    $form->ckeditor("index_text_section_2", "index_text_section_2");
                    $form->ckeditor("index_text_section_3", "index_text_section_3");
                    $form->ckeditor("index_text_durability", "надежно");
                    $form->ckeditor("index_text_security", "безопасно");
                    $form->ckeditor("index_text_cash", "выгодно");
                    $form->ckeditor("index_text_secure", "конфинденциально");
                    $form->text("discount_size", "Размер скидки");
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
        \Settings::set("index_page_text", $data["index_page_text"]);
        \Settings::set("index_bordered_page_text", $data["index_bordered_page_text"]);
        \Settings::set("counter_text", $data["counter_text"]);
        \Settings::set("full_address", $data["full_address"]);
        \Settings::set("phone", $data["phone"]);
        \Settings::set("description", $data["description"]);
        \Settings::set("keywords", $data["keywords"]);
        \Settings::set("email", $data["email"]);
        \Settings::set("working_time", $data["working_time"]);
        \Settings::set("yandex_analytics", $data["yandex_analytics"]);
        \Settings::set("yandex_map", $data["yandex_map"]);
        \Settings::set("meta_title", $data["meta_title"]);

        \Settings::set("index_text_section_1", $data['index_text_section_1']);
        \Settings::set("index_text_section_2", $data['index_text_section_2']);
        \Settings::set("index_text_section_3", $data['index_text_section_3']);
        \Settings::set("index_text_durability", $data['index_text_durability']);
        \Settings::set("index_text_security", $data['index_text_security']);
        \Settings::set("index_text_cash", $data['index_text_cash']);
        \Settings::set("index_text_secure", $data['index_text_secure']);
        \Settings::set("discount_size", $data['discount_size']);

        if (array_key_exists("address_image", $data)) {
            \Settings::set("address_image", $imageField->prepare($data["address_image"]));
        }

        \Settings::set("google_analytics", $data["google_analytics"]);

        \Settings::save();
    }
}
