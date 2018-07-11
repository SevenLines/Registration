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

        $phone = preg_replace('/\\D/', "", $phone);
        if (strlen($phone) == 10) {
            $phone = "+7".$phone;
        } else if (strlen($phone) == 11 && $phone[0] == '7') {
            $phone = "+".$phone;
        }

        $name = $request->get("name");
        Mail::send('emails.query', ["phone" => $phone, "name" => $name], function ($m) use ($phone) {
            $m->from(config("mail.username"), 'мосрвп.рф');
            $m->to(config("mail.username"), "мосрвп.рф")->subject("Заявка на сайте Мосрвп.рф: $phone");
        });
    }
}