<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //Table name
    protected $table = 'gallery';

    //Primary key
    public $primaryKey = 'id';

    public function apartments()
    {
        return $this->belongsTo('App\Apartment');
    }

}
