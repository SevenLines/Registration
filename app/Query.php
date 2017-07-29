<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    const STATUS_NOT_READY = 0;
    const STATUS_IN_WORK = 1;
    const STATUS_READY = 2;
    const STATUS_TAKEN = 3;

    const SERVICE_UNDEFINED = 0;
    const SERVICE_OTHER = -1;
    const SERVICE_ALL = -2;
    const SERVICE_WITH = -3;

    const SERVICES = [
        Query::SERVICE_UNDEFINED => '-',
        1 => 'регистрация',
        2 => 'патент',
        3 => 'тестирование',
        4 => 'медкомиссия',
        5 => 'РВП',
        6 => 'ВНЖ',
        7 => 'гражданство',
        8 => 'страховка',
        9 => 'загранпаспорт',
        10 => 'виза',
        11 => 'ВКС',
        Query::SERVICE_OTHER => 'другое',
    ];


    protected $guarded = ['id'];

    protected $attributes = [
        'status' => Query::STATUS_NOT_READY,
        'service' => Query::SERVICE_UNDEFINED,
        'paid' => 0
    ];

    public function client()
    {
        return $this->belongsTo('App\Client')->withDefault();
    }
}
