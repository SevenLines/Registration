<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 23.03.18
 * Time: 15:16
 */

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Service;

class ServiceController extends Controller
{

    function get_services()
    {
        return Service::whereVisible(true);
    }

    public function index()
    {
        $services = $this->get_services()->get();

        $sorted_services = $services->sortBy("index_page_order");

        return view('index', ["services" => $services, "sorted_services" => $sorted_services]);
    }

    public function list_all()
    {
        $services = $this->get_services()->with("subServices")->get();
        return view("services.all", ["services" => $services]);
    }

    public function detail($service)
    {
        $services = $this->get_services()->get();
        $info = Service::whereAlias($service)->with("subServices")->first();
        return view("layouts.service", ["service" => $info, "services" => $services]);
    }
}