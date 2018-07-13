<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Reminder
 *
 * @property int $id
 * @property string $comment
 * @property string $remind_date
 * @property string $fio
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reminder whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reminder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reminder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reminder whereRemindDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reminder whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reminder whereFio($value)
 * @property int $is_sent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reminder whereIsSent($value)
 */
class Reminder extends Model
{
    //
    protected $guarded = ['id'];
}
