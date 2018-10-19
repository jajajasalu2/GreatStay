<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Apartment;

class Review extends Model
{
    protected $table = 'reviews';
    protected $c_id = 'c_id';
    protected $a_id = 'a_id';
    public function reviewer() {
        return $this->belongsTo('App\User','c_id','id');
    }
    public function apartment() {
        return $this->hasOne('App\Apartment','a_id','id');
    }
}
