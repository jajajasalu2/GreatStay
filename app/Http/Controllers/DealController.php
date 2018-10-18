<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deal;
use App\Apartment;

class DealController extends Controller
{
    public function store(Request $request) {
        $this->validate($request,['a_id'=>'required','check_in'=>'required','check_out'=>'required']);
        $deal = new Deal;
        $client_id = auth()->id();
        $apartment = Apartment::find($request->input('a_id'));
        $owner_id = $apartment->owner()->get()->first()->id;
        $deal->a_id = $request->input('a_id');
        $deal->o_id = $owner_id;
        $deal->c_id = $client_id;
        $deal->check_in = $request->input('check_in');
        $deal->check_out = $request->input('check_out');
        $deal->duration = (strtotime($deal->check_out) - strtotime($deal->check_in))/86400;
        $deal->save();
        return 1;
    }

    public function validate_deal(Request $request) {
        $owner_id = auth()->id(); 
        if ($owner_id == $request->input('o_id')) {
            //return some view confirming 
        }
    }
}
