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
        
        
        $currentUser = Auth::user()->id;
        $like = new Like();
        $like->user_id = $currentUser;
        $currentReview = $like->review_id = $request->review_id;
        $like = Like::firstOrNew(['review_id' => $currentReview, 'user_id' => $currentUser]);
        $like->save();
        $CurrentProductId = Review::find($currentReview)->product_id;
        
        return redirect("/product/$CurrentProductId");
    }

    public function storeDislike(Request $request)
    {
        // $this->validate($request,[
        //     "review_id" => "required | exists:reviews,id",
        // ]);
        
        
        $currentUser = Auth::user()->id;
        $dislike = new Dislike();
        $dislike->user_id = $currentUser;
        $currentReview = $dislike->review_id = $request->review_id;
        $dislike = Dislike::firstOrNew(['review_id' => $currentReview, 'user_id' => $currentUser]);
        $dislike->save();
        $CurrentProductId = Review::find($currentReview)->product_id;
        
        return redirect("/product/$CurrentProductId");
        
    }
}
