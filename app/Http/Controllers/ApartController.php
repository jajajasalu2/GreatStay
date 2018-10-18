<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
use App\Deal;
use App\Apartment;

class ApartController extends Controller
{   
    public function store(Request $request) {
        
        $this->validate($request,['addr'=>'required','bhk'=>'required',
                                'cost_per_day'=>'required','image'=>'required']);
        if($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/images',$fileNameToStore);
        }
        else {
            $fileNameToStore = 'noimage.jpeg';
        }
        $o_id = auth()->id();
        $apartment = new Apartment;
        $apartment->bhk = $request->input('bhk');
        $apartment->addr = $request->input('addr');
        $apartment->cost_per_day = $request->input('cost_per_day');
        $apartment->o_id = $o_id;
        $apartment->image = $fileNameToStore;
        $apartment->save();
        return 1;
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
        return view('show_apartment')->with('apartment',$apartment)
                                    ->with('check_in',$check_in)
                                    ->with('check_out',$check_out);
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
        foreach ($apartments as $apartment) {
            $apartment_id = $apartment->id;	
            $flag = 0;
            foreach ($deals as $deal) {
                $deal_apart_id = $deal->a_id;
                if ($apartment_id == $deal_apart_id) {
                    $flag = 1;
                    break;
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
