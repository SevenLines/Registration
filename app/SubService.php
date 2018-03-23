<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SubService
 *
 * @property int $id
 * @property string $title
 * @property string $price
 * @property string $documents
 * @property int $service_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubService whereDocuments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubService wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubService whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubService whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubService whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SubService extends Model
{
    //
    public function service() {
        return $this->belongsTo('App\Service')->withDefault();
    }

    public function getDocumentsListAttribute() {
        return explode(";", $this->documents);
    }
}
