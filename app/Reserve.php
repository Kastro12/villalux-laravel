<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    //Table name
    protected $table = 'reserves';

    //Primary key
    public $primaryKey = 'id';

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function apartment()
    {
        return $this->belongsTo('App\Apartment');
    }
}
