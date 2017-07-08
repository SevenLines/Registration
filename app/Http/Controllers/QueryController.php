<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 08.07.17
 * Time: 14:02
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class QueryController extends Controller
{
    /**
     * @return Response
     */
    public function addQuery(Request $request) {
        $phone = $request->get("phone");
        Mail::send('emails.query', ["phone" => $phone], function ($m) {
            $m->from('hello@app.com', 'Your Application');
            $m->to("mmailm@mail.ru", "mick")->subject('Your Reminder!');
        });
    }
}