<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 23.03.18
 * Time: 15:16
 */

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Str;
use App\Service;

class ServiceController extends Controller
{

    function get_services()
    {
        return Service::whereVisible(true);
    }

    function get_articles()
    {
        return Article::whereVisible(true)->get();
    }

    public function index()
    {
        $services = $this->get_services()->get();

        $sorted_services = $services->sortBy("index_page_order");

        return view('index', [
            "services" => $services,
            "articles" => $this->get_articles(),
            "sorted_services" => $sorted_services
        ]);
    }

    public function list_all()
    {
        $services = $this->get_services()->with("subServices")->get();
        return view("services.all", [
            "services" => $services,
            "articles" => $this->get_articles(),
        ]);
    }

    public function detail($service)
    {
        $services = $this->get_services()->get();
        $info = Service::whereAlias($service)->with("subServices")->first();
        return view("layouts.service", [
            "service" => $info,
            "services" => $services,
            "articles" => $this->get_articles(),
        ]);
    }

    public function article($article_id)
    {
        $article = Article::whereId($article_id)->first();
        return view("layouts.article", [
            "services" => $this->get_services()->get(),
            "articles" => $this->get_articles(),
            "article" => $article
        ]);
    }
}