<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Apartment extends Model
{
    protected $table = 'apartment';
    protected $a_id = 'id';
    protected $bhk = 'BHK';
    protected $cost_per_day = 'cost_per_day';
    protected $o_id = 'o_id';
    public function owner() {
        return $this->belongsTo('App\User','o_id','id');
    }
}
