<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deal;
use App\Review;

class ReviewController extends Controller
{
    public function store(Request $request) {
        $this->validate($request,['a_id'=>'required','review'=>'required'])
        $deals = new Deal;
        $reviewer = auth()->user();
        $deals = Deal::where('a_id','=',$request->input('a_id'))
                    ->where('c_id','=',$reviewer->id);
        if (count($deals) == 0) {
            return "You haven't ever booked this apartment before!";
        }
        $review = new Review;
        $review->a_id = $request->input('a_id');
        $review->c_id = $reviewer->id;
        $review->rating = $request->input('rating');
        $review->review = $request->input('review');
        $review->save();
        return back();
    }
}
