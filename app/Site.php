<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static get()
 */
class Site extends Model
{
    protected $fillable = [
        'userId',
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
