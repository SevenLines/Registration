<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Query
 *
 * @property int $id
 * @property int $status
 * @property int $client_id
 * @property int $price
 * @property int $paid
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $service
 * @property string|null $comment
 * @property-read \App\Client $client
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Query whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Query whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Query whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Query whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Query wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Query wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Query whereService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Query whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Query whereUpdatedAt($value)
 * @mixin Eloquent
 */
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
    const SERVICE_NOT_READY= -4;
    const SERVICE_IN_WORK= -5;
    const SERVICE_READY= -6;

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
