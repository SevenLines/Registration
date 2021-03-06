<?php

namespace App\Http\Controllers;

use App\Query;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QueriesController extends Controller
{
    public function __construct()
    {
//        $this->middleware("auth");
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Query::create(
            $request->all()
        );

        return Response();
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Query  $query
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Query $query)
//    {
//        //
//    }

//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  \App\Query  $query
//     * @return \Illuminate\Http\Response
//     */
//    public function edit(Query $query)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Query $query)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function destroy(Query $query)
    {
        //
        $query->delete();

        return new Response();
    }
}
