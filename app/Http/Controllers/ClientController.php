<?php

namespace App\Http\Controllers;

use App\Client;
use App\Query;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    public function __construct()
    {
    }

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
        $legal_id = $request->get("legal_id");
        $itemsPerPage = 15;

        $query = Client::query();

        if ($fio) {
            $query->where("fio", 'LIKE', "%$fio%");
        }
        if ($passport) {
            $query->where("passport", 'LIKE', "%$passport%");
        }
        if ($phone) {
            $query->where("phone", 'LIKE', "%$phone%");
        }
        if ($legal_id) {
            $query->whereHas('legals', function ($query) use ($legal_id) {
                $query->where("legal_id", '=', $legal_id);
            });
        }
        if (!is_null($service) && $service != Query::SERVICE_ALL) {
            $query->whereHas("queries", function ($query) use ($service) {
                if ($service == Query::SERVICE_WITH) {
                    $query->where("status", "!=", Query::STATUS_TAKEN);
                } else if ($service == Query::SERVICE_NOT_READY) {
                    $query->where("status", "=", Query::STATUS_NOT_READY);
                } else if ($service == Query::SERVICE_IN_WORK) {
                    $query->where("status", "=", Query::STATUS_IN_WORK);
                } else if ($service == Query::SERVICE_READY) {
                    $query->where("status", "=", Query::STATUS_READY);
                } else {
                    $query->where("service", "=", $service);
                }
            });
        }

        $query->withCount("clients");

        $query = $query->with([
            "queries" => function ($query) {
                $query->orderBy("updated_at", "desc")->where("status", "!=", Query::STATUS_TAKEN);
            }
        ]);

        $totalCount = $query->count();

        if (in_array($sort, ['fio', 'passport', 'birthday', 'phone', 'created_at', 'expenses', 'profit'])) {
            $query = $query->orderBy($sort, $sortOrder);
        }


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
        $values = $request->all();
        $legal_id = null;
        if (array_key_exists("legal_id", $values)) {
            $legal_id = $values['legal_id'];
            unset($values['legal_id']);
        }

        $client = Client::create(
            $values
        );

        if ($legal_id) {
            $client->legals()->attach([
                'legal_id' => $legal_id,
            ]);
        }

        return $client;
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
        $query->with("legal");

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
            'expenses' => $request->get("expenses"),
            'comment' => $request->get("comment"),
            'legal_id' => $request->get("legal_id"),
        ]);
        return new Response();
    }

    public function query_update($id, Request $request)
    {
        Query::find($request->get("id"))->update([
            'price' => $request->get("price"),
            'paid' => $request->get("paid"),
            'status' => $request->get("status"),
            'expenses' => $request->get("expenses"),
            'service' => $request->get("service"),
            'comment' => $request->get("comment"),
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
        $client->delete();

        return new Response();
    }
}
