<?php

namespace App\Http\Controllers;

use App\Client;
use App\Query;
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
        $service = $request->get("service");
        $sort = $request->get("sort");
        $sortOrder = $request->get("sort_order");
        $itemsPerPage = 15;

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
        if (!is_null($service) && $service != Query::SERVICE_ALL) {
            $query = Client::whereHas("queries", function ($query) use ($service) {
                if ($service == Query::SERVICE_WITH) {
                    $query->where("status", "!=", Query::STATUS_TAKEN);
                } else {
                    $query->where("service", "=", $service);
                }
            });
        }

        $query = $query->with([
            "queries" => function ($query) {
                $query->orderBy("updated_at", "desc")->where("status", "!=", Query::STATUS_TAKEN);
            }
        ]);

        $totalCount = $query->count();

        $query = $query->orderBy($sort, $sortOrder);

        if ($page) {
            $query = $query->offset($page * $itemsPerPage);
        }

        $query = $query->limit($itemsPerPage)->orderBy("fio");

        return [
            "records" => $query->get(),
            "totalCount" => $totalCount,
            "page" => $page,
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
        Client::find($client->id)->update($request->all());

        return new Response();
    }


    public function queries($id, Request $request)
    {
        $showTaken = $request->get("showTaken");

        $query = Query::query()
            ->where("client_id", "=", $id)
            ->orderBy("updated_at", 'desc');

        if ($showTaken != 'true') {
            $query->where("status", "!=", Query::STATUS_TAKEN);
        }

        return $query->get();
    }

    public function query_add($id, Request $request)
    {
        Query::create([
            "client_id" => $id,
            'price' => $request->get("price"),
            'paid' => $request->get("paid"),
            'status' => $request->get("status"),
            'service' => $request->get("service"),
        ]);
        return new Response();
    }

    public function query_update($id, Request $request)
    {
        Query::find($request->get("id"))->update([
            'price' => $request->get("price"),
            'paid' => $request->get("paid"),
            'status' => $request->get("status"),
            'service' => $request->get("service"),
        ]);
        return new Response();
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
