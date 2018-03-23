<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    protected $fillable = [
        'email', 'pic',
    ];
}
