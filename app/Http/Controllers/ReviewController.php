<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Manufacturer;
use App\Country;
use App\Review;
use Illuminate\Support\Facades\Auth;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = Product::all();
        $manufacturers = Manufacturer::all();
        // dd($products);
        return view('reviews.create_form', ['products'=> $products, 'manufacturers' => $manufacturers]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            "title" => "required | max:100",
            "review_detail" => "required | max:1000",
            "rating" => "required | integer | min:1 | max:5",
        ]);
        
        $user_id = Auth::user()->id;
        $review = new Review();
        $review->title = $request->title;
        $review->review_detail = $request->review_detail;
        $review->rating = $request->rating;
        $product_id = $review->product_id;
        $review->user_id = $user_id;
        $review->save();
        return redirect("/product/$product_id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //This is to retrieve review content including title, review detail, rating, etc
        $review = Review::find($id);
        // dd($review);
        //This is to get product info
        $product = $review->products;
        // dd($product);
        
        return view('reviews.edit_form', ['review' => $review, 'product' => $product]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $this->validate($request,[
            "title" => "required | max:100",
            "review_detail" => "required | max:1000",
            "rating" => "required | integer | min:1 | max:5",
        ]);
        
        $user_id = Auth::user()->id;
        
        $review = Review::find($id);
        $review->title = $request->title;
        $review->review_detail = $request->review_detail;
        $review->rating = $request->rating;
        $product_id = $review->product_id;
        
        // dd($product_id);
        
        //if administrator edits the review, the author is still the original author instead of administrator name
        if(Auth::user()->isAdmin()) {
            $user_id = $review->user_id;
        } else {
            $review->user_id = $user_id;
        }
        
        $review->save();
        return redirect("/product/$product_id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
