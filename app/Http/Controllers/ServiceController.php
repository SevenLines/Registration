<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 23.03.18
 * Time: 15:16
 */

namespace App\Http\Controllers;


use App\Service;

class ServiceController extends Controller
{
    public function index() {
        $services = Service::all();
        return view('index', ["services" => $services]);
    }

    public function list_all() {
        $services = json_decode( file_get_contents("../services.json"));
        return view("services.all", ["services" => $services]);
    }

    public function detail($service) {
        $info = Service::whereAlias($service)->with("subServices")->first();
        return view("services.$service", ["service" => $info]);
    }
}