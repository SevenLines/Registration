<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 24.03.18
 * Time: 12:49
 */

namespace App\Admin\Extensions\Form;

use Encore\Admin\Form\Field;

class CKEditor extends Field
{
    public static $js = [
        '/packages/ckeditor/ckeditor.js',
        '/packages/ckeditor/adapters/jquery.js',
    ];

    protected $view = 'admin.ckeditor';

    public function render()
    {
        $this->script = "$('textarea.{$this->getElementClassString()}').ckeditor({
            allowedContent: true
        });";


        return parent::render();
    }
}