<?php

namespace App\Http\Controllers;

use App\Article;
use App\Service;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    function index() {
        $services = Service::whereVisible(true)->get();
        $articles = Article::whereVisible(true)->get();

        return Response::view('sitemap', [
            'services' => $services,
            'articles' => $articles
        ])->header('Content-Type', 'text/xml');
    }
}
