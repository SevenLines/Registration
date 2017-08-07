<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Client
 *
 * @property int $id
 * @property string $fio
 * @property string|null $phone
 * @property string $birthday
 * @property string|null $passport
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $comment
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Query[] $queries
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereFio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client wherePassport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Client[] $clients
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Client[] $legals
 */
class Client extends Model
{
    //
    protected $guarded = ['id'];

    public function queries()
    {
        return $this->hasMany('App\Query');
    }

    public function clients()
    {
        return $this->belongsToMany("App\Client", 'legal_client', 'legal_id', 'client_id');
    }

    public function legals() {
        return $this->belongsToMany("App\Client", 'legal_client', 'client_id', 'legal_id');
    }
}
