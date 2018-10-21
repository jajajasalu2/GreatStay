<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use DB;

class Apartment extends Model
{
    protected $table = 'apartment';
    protected $o_id = 'o_id';
    public function owner() {
        return $this->belongsTo('App\User','o_id');
    }
    public function location() {
        return DB::select('select location from locations where id = ?',[$this->location_id])[0]->location;
    }
    public function images() {
        $result = DB::select('select name from apartment_images where a_id = ?',[$this->id]);	
        $images = [];
        for ($i = 0;$i<count($result);$i++) {
            array_push($images,$result[$i]->name);
        }
        return $images;
    }

    public function documents() {
        $result = DB::select('select name from apartment_documents where a_id = ?',[$this->id]);	
        $documents = [];
        for ($i = 0;$i<count($result);$i++) {
            array_push($documents,$result[$i]->name);
        }
        return $documents;
    }
}
