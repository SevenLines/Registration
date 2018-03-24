<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * App\Service
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property string $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $image
 * @property int $visible
 * @property int $order
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SubService[] $subServices
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereVisible($value)
 */
class Service extends Model
{
    //
    public function subServices() {
        return $this->hasMany("App\SubService");
    }

    public function getImageUrlAttribute() {
        return Storage::disk(config('admin.upload.disk'))->url($this->image);
    }
}
