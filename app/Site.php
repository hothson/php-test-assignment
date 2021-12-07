<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
