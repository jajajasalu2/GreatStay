<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Deal;
use App\Apartment;

class DealController extends Controller
{
	public function isAvailable($check_in_input,$check_out_input,$apartment_id) {
		$deals = new Deal;
		$deals = Deal::where('a_id','=',$apartment_id)->get();
		foreach ($deals as $deal) {
			$check_in_booking = $deal->check_in;
			$check_out_booking = $deal->check_out;
			$difference1 = strtotime($check_in_input) - strtotime($check_out_booking);
			$difference2 = strtotime($check_in_input) - strtotime($check_in_booking);
			$difference3 = strtotime($check_out_input) - strtotime($check_out_booking);
			$difference4 = strtotime($check_out_input) - strtotime($check_in_booking);
			if (($difference4 > 0 && $difference3 < 0) || 
				($difference1 < 0 && $difference2 > 0) || 
				($difference3 > 0 && $difference2 < 0) || 
				($difference2 > 0 && $difference3 < 0)) {
				return 0;
			}
		}
		return 1;
	}

	public function bookedMoreThanOnce($check_in,$check_out,$apartment_id,$c_id) {
		$deals = Deal::where('a_id','=',$apartment_id)->where('c_id','=',$c_id)->get();
		foreach ($deals as $deal) {
			if (strtotime($deal->check_out) > strtotime(Carbon::now())) {
				return 1;
			}
		}
		return 0;
	}	

    public function store(Request $request) {
	if (!Auth::check()) {
		return back()->with('error','It seems you\'re not logged in!');
	}
        $this->validate($request,['a_id'=>'required','check_in'=>'required','check_out'=>'required']);
        $deal = new Deal;
        $client_id = auth()->id();
        $apartment = Apartment::find($request->input('a_id'));
	$check_in = $request->input('check_in');
	$check_out = $request->input('check_out');
	if (strtotime($check_out) < strtotime($check_in)) {
		$temp = $check_in;
		$check_in = $check_out;
		$check_out = $temp;
	}
	if (strtotime($check_in) < strtotime(Carbon::now()) || strtotime($check_out) < strtotime(Carbon::now())) {
		return back()->with('error','Can\'t book on this date :(');
	}
	if (!DealController::isAvailable($check_in,$check_out,$apartment->id)) {
		return back()->with('error','Can\'t book on this date :(');
	}
	if (DealController::bookedMoreThanOnce($check_in,$check_out,$apartment->id,auth()->id())) {
		return back()->with('error','Already booked this room');
	}
        $owner_id = $apartment->owner()->first()->id;
        $deal->a_id = $request->input('a_id');
        $deal->o_id = $owner_id;
		$deal->c_id = auth()->id();
        $deal->check_in = $check_in;
        $deal->check_out = $check_out;
        $deal->duration = (strtotime($deal->check_out) - strtotime($deal->check_in))/86400;
        $deal->save();
        return back()->with('success','Your room has been booked. Have a nice stay!');
    }
}
