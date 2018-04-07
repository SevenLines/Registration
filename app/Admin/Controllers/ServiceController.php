<?php

namespace App\Admin\Controllers;

use App\Service;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ServiceController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Service::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->column("title", 'Название')->editable()->sortable();
            $grid->column("alias", 'URL')->editable()->sortable();
            $grid->visible("Видимость")->switch([
                'on' => ['value' => 1],
                'off' => ['value' => 0],
            ]);

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Service::class, function (Form $form) {
            $form->tab("Общие", function (Form $form) {
                $form->switch("visible")->states([
                    'on' => ['value' => 1],
                    'off' => ['value' => 0],
                ]);

                $form->text("title", "Название");
                $form->text("alias", "URL");
                $form->image("image", "Изображение")->move("images/services")->uniqueName();
                $form->ckeditor('description', "Описание");

            })->tab("Услуги", function (Form $form) {
                $form->hasMany("subservices", "", function (Form\NestedForm $form) {
                    $form->text("title", "название");
                    $form->text("price", "цена");
                    $form->text("documents", "документы");
                });
            })->tab("SEO", function (Form $form) {
                $form->textarea("meta_description", "Описание для SEO");
                $form->text("meta_keywords", "Ключевые слова");
                $form->text("meta_title", "Заголовок страницы");
            });
        });
    }
}
