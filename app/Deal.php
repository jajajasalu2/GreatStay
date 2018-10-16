<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Deal extends Model
{
    protected $table = 'deals';
    protected $d_id = 'd_id';
    protected $o_id = 'o_id';
    protected $c_id = 'c_id';
    public function owner() {
        return $this->belongsTo('App\User','o_id','id');
    }
    public function client() {
        return $this->belongsTo('App\User','c_id','id');
    }
}
