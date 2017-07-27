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

    const SERVICES = [
        'undefined' => Query::SERVICE_UNDEFINED,
        'registration' => 1,
        'patent' => 2,
        'testing' => 3,
        'medcommision' => 4,
        'rvp' => 5,
        'vng' => 6,
        'grazhdanstvo' => 7,
        'insurance' => 8,
        'zagranpassport' => 9,
        'visa' => 10,
        'vks' => 11,
        'other' => Query::SERVICE_OTHER,
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
