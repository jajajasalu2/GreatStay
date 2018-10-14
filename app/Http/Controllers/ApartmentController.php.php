<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Apartment;

class ApartmentController extends Controller
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
        $apartment->bhk = $request->bhk;
        $apartment->addr = $request->addr;
        $apartment->cost_per_day = $request->cost_per_day;
        $apartment->o_id = $o_id;
        $apartment->image = $fileNameToStore;
        $apartment->save();
        return 1;
    }

    public function show($id) {
        $apartment = Apartment::find($id);
        return $apartment;
    }

    public function destroy($id)
    {
        $apartment = Sale::find($id);
        if(auth()->id() !== $apartment->o_id) {
            return 'error';
            //return back()->with('error','Your trespassing has been reported. Expect a visit from the Trenchcoat Mafia soon.');
        }
        $sale->delete();
        return 'deleted';
        //return back()->with('success','Item(s) deleted successfully');
    }
}