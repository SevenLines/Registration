<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fio = $request->get("fio");
        $passport = $request->get("passport");
        $phone = $request->get("phone");
        $birthday = $request->get("birthday");
        $page = $request->get("page");
        $itemsPerPage = 10;

        $query = Client::query();

        if ($fio) {
            $query = Client::where("fio", 'LIKE', "%$fio%");
        }
        if ($passport) {
            $query = Client::where("passport", 'LIKE', "%$passport%");
        }
        if ($phone) {
            $query = Client::where("phone", 'LIKE', "%$phone%");
        }
        $totalCount = $query->count();

        if ($page) {
            $query = $query->offset($page * $itemsPerPage);
        }

        $query = $query->limit($itemsPerPage)->orderBy("created_at", 'desc');

        return [
            "records" => $query->get(),
            "totalCount" => $totalCount,
            "page"=> $page,
            "totalPages" => ceil($totalCount / $itemsPerPage),
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Client::create(
            $request->all()
        );

        return new Response();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
