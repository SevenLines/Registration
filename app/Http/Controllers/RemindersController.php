<?php

namespace App\Http\Controllers;

use App\Reminder;
use DateTime;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RemindersController extends Controller
{
    function index(Request $request) {
        $query = Reminder::query();

        $itemsPerPage = 5;
        $page = $request->get("page");
        $actualOnly = $request->get("actualOnly");

        $totalCount = $query->count();

        if ($page) {
            $query = $query->offset($page * $itemsPerPage);
        }
        if ($actualOnly) {
            $query = $query->where("reminder_date", ">=", new DateTime('now', 'UTC'));
        }
        $query = $query->limit($itemsPerPage)
            ->orderBy("is_sent")
            ->orderBy("remind_date");

        return [
            'records' => $query->get(),
            'totalCount' => $totalCount,
            'page' => $page,
            "totalPages" => ceil($totalCount / $itemsPerPage),
        ];
    }

    function update(Request $request, Reminder $reminder) {
        Reminder::find($reminder->id)->update($request->all());
        return new Response();
    }

    function store(Request $request) {
        $values = $request->all();

        $reminder = Reminder::create($values);

        return $reminder;
    }

    function destroy(Reminder $reminder) {
        $reminder->delete();
        return new Response();
    }
}
