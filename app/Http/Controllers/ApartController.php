<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
use App\Deal;
use App\Apartment;
use App\Review;

class ApartController extends Controller
{   
    public function store(Request $request) {
        if (!Auth::check()) {
            return redirect('/home');
        }
        $this->validate($request,['addr'=>'required','bhk'=>'required',
                                'cost_per_day'=>'required','image'=>'required',
                                'images'=>'required']);
        $images = $request->file('images');
        for ($i = 0;$i<count($images);$i++) {
            $fileNameWithExt = $images[$i]->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $images[$i]->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $images[$i]->storeAs('public/images',$fileNameToStore);
            DB::table('apartment_image')->insert();
        }
        $o_id = auth()->id();
        $apartment = new Apartment;
        $apartment->bhk = $request->input('bhk');
        $apartment->addr = $request->input('addr');
        $apartment->cost_per_day = $request->input('cost_per_day');
        $apartment->o_id = $o_id;
        $apartment->image = $fileNameToStore;
        $apartment->save();
        return back();
    }

    public function show($id) {
        $apartment = Apartment::find($id);
        if (session('check_in')) {
            $check_in = session('check_in');
        }
        else {
            $check_in = Carbon::now();
        }
        if (session('check_out')) {
            $check_out = session('check_out');
        }
        else {
            $check_out = Carbon::now();
        }
        $reviews = Review::where('a_id','=',$apartment->id)->get();
        return view('show_apartment')->with('apartment',$apartment)
                                    ->with('check_in',$check_in)
                                    ->with('check_out',$check_out)
                                    ->with('reviews',$reviews);
    }

    public function destroy($id) {
        $apartment = Apartment::find($id);
        if(auth()->id() !== $apartment->o_id) {
            return 'error';
        }
        $apartment->delete();
        return 'deleted';
    }

    public function list(Request $request) {
        $this->validate($request,['check_in'=>'required','check_out'=>'required','location'=>'required']);
        $location = $request->input('location');
        $apartments = new Apartment;
        $apartments = Apartment::where('location_id','like',$location)->get();
        $viable_apartments = array();
        $deals = new Deal;
        $deals = Deal::all();
        $check_in_input = $request->input('check_in');
        $check_out_input = $request->input('check_out');
        
        foreach ($apartments as $apartment) {
            $apartment_id = $apartment->id;	
            $flag = 0;
            foreach ($deals as $deal) {
                $deal_apart_id = $deal->a_id;
                if ($apartment_id == $deal_apart_id) {
                    $check_in_booking = $deal->check_in;
                    $check_out_booking = $deal->check_out;
                    $difference1 = strtotime($check_in_input) - strtotime($check_out_booking);
                    $difference2 = strtotime($check_in_input) - strtotime($check_in_booking);
                    $difference3 = strtotime($check_out_input) - strtotime($check_out_booking);
                    $difference4 = strtotime($check_out_input) - strtotime($check_in_booking);
                    if (($difference4 > 0 && $difference3 < 0) || 
                    ($difference1 < 0 && $difference2 > 0) || 
                    ($difference3 > 0 && $difference2 < 0) || ($difference2>0 && $difference3<0)) {
                        $flag = 1;
                        break;
                    }
                }
            }
            if ($flag == 0) {
                array_push($viable_apartments,$apartment);
            }
        }
        session(['check_in' => $request->input('check_in')]);
        session(['check_out' => $request->input('check_out')]);
        return $viable_apartments;
    }
}
