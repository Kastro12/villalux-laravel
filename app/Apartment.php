<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    //Table name
    protected $table = 'apartments';

    //Primary key
    public $primaryKey = 'id';

    public function reserves(){
        return $this->hasMany('App\Reserve');
    }

    public function gallery(){
        return $this->belongsTo('App\Gallery');
    }
}
