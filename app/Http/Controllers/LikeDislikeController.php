<?php

namespace App\Http\Controllers;
use App\Like;
use App\Dislike;

use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LikeDislikeController extends Controller
{
    //
    
    public function __construct() {
        $this->middleware('auth', ['except' => []]);
    }
    
    
    public function storeLike(Request $request)
    {
        
        $this->validate($request,[
            "review_id" => "required | exists:reviews,id",
        ]);
        
        //To check if the existing vote exists
        $existing = Like::where('user_id', '=', Auth::user()->id)->where('review_id', '=', $request->review_id) -> exists();
        // dd($existing);
        
        if (!$existing) {
            Auth::user()->likes()->create([
                'review_id' => $request['review_id'],
            ]);
            
            session()->flash('success', 'You like this post!!');
            
        } else {
            session()->flash('warning', 'You have voted this before');
        }

        // $review_id = request('review_id');
        // $count = Like::where('review_id', '=', $review_id)->count();
        // dd($count);
        return redirect()->back();
        
    }

    public function storeDislike(Request $request)
    {
        
        $this->validate($request,[
            "review_id" => "required | exists:reviews,id",
        ]);
        
        //To check if the existing vote exists
        $existing = Dislike::where('user_id', '=', Auth::user()->id)->where('review_id', '=', $request->review_id) -> exists();
        // dd($existing);
        
        if (!$existing) {
            Auth::user()->dislikes()->create([
                'review_id' => $request['review_id'],
            ]);
            
            session()->flash('success', "You don't like this post :(");
            
        } else {
            session()->flash('warning', 'You have voted this before');
        }

        // $review_id = request('review_id');
        // $count = Like::where('review_id', '=', $review_id)->count();
        return redirect()->back();
        
    }

}
