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
        $owner_id = $apartment->owner()->id;
        $deal->a_id = $request->input('a_id');
        $deal->o_id = $owner_id;
        $deal->check_in = $request->input('check_in');
        $deal->check_out = $request->input('check_out');
        $deal->duration = $deal->check_out - $deal->check_in;
        $deal->save();
        return 1;
    }
}
