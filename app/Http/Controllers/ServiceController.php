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
use Illuminate\Support\Facades\View;

class ServiceController extends Controller
{
    public function __construct()
    {
        $services = $this->get_services()->get();
        $articles = $this->get_articles();

        View::share('articles', $articles);
        View::share('services', $services);
    }

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
        $sorted_services = $this->get_services()->get()->sortBy("index_page_order");

        return view('index', [
            "sorted_services" => $sorted_services
        ]);
    }

    public function list_all()
    {
        return view("services.all", [
            "articles" => $this->get_articles(),
        ]);
    }

    public function detail($service)
    {
        $info = Service::whereAlias($service)->with("subServices")->first();
        return view("layouts.service", [
            "service" => $info,
        ]);
    }

    public function article($article_id)
    {
        $article = Article::whereId($article_id)->first();
        return view("layouts.article", [
            "article" => $article
        ]);
    }

}