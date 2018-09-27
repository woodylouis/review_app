<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Manufacturer;
use App\Country;
use App\Review;
use App\User;
use App\Like;
use Illuminate\Support\Facades\Auth;
use DB;

class ProductController extends Controller
{
    //Guests can see the product list, details, and even add a product
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show', 'create', 'store', 'numberOfReviewsDESC']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // In the product index page, it will show products' name, description, number of reviews and average ratingfor each product
        $products = Product::selectRaw('products.*, count(reviews.id) as numberOfReview, avg(reviews.rating) as AvgRating, reviews.product_id')
                          ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                          ->groupBy('products.id')
                          ->get();
        
        // $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create_form')->with('manufacturers', Manufacturer::all());
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
                "product_name" => "required | max:100 | unique:products",
                "product_description" => "required | max:1000",
                "price" => "required | numeric | min:0",
                'manufacturer' =>'exists:manufacturers,id'
            ]);
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->price = $request->price;
        $product->manufacturer_id = $request->manufacturer;
        $product->save();
        return redirect("/product/$product->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //This is to show products' details such as product name, price, place of origin, manufacturers etc
        $product = Product::find($id);
        
        //This is to show review details such as author, title, review content, rating etc for each product, order by creation date, 5 reviews per page
        $reviews = $product->users()->orderBy('pivot_created_at', 'desc')->paginate(5);
        
        // $reviewsForCurrentProduct = Review::where('product_id', $id)->get();

        // foreach($reviewsForCurrentProduct as $reviewForCurrentProduct) {
        //     $reviewId = $reviewForCurrentProduct->id;
        //     $countForEachReview = Like::where('review_id', $reviewId)->count();
        //     // dd($countForEachReview);
        // }
    
        // $re
        
        $reviewss = Review::where('product_id', $id)->get();
        
        foreach($reviewss as $review) {
            $review_id = $review->id;
            
        }
        
        $likes = Like::where('review_id', $review_id)->get();
        // dd($likes);
        
        
        return view('products.show', ['product' => $product, 'reviews' => $reviews, 'likes' => $likes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        if(Auth::user()->isAdmin()) {
            $product = Product::find($id);
            return view('products.edit_form') -> with('product', $product) -> with('manufacturers', Manufacturer::all());
        } else {
            
            echo "<h2 style='color:tomato;'>You don't have right to edit the product. Redirect to home page in 5 seconds......</h2>";
            header( "refresh:5;url=/product/$id" );
        }
        
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
            "product_name" => "required | max:100",
            "product_description" => "required | max:1000",
            "price" => "required | numeric | min:0",
            'manufacturer' =>'exists:manufacturers,id'
        ]);
        
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->product_description = $request->product_description;
        $product->manufacturer_id = $request->manufacturer;
        $product->save();
        return redirect("/product/$product->id");
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
        $product = Product::find($id);    
        $product->delete();
        
        $reviewForTheProduct = Review::where('product_id', $id)->delete();
        return redirect ('/product');
    }
    
    
    public function numberOfReviewsDESC() {
        /*
            Select product, count number product and calculate avergae of rating, order by number of reviews in descending order
        */
        
        $products = Product::selectRaw('products.*, count(reviews.id) as numberOfReview, avg(reviews.rating) as AvgRating, reviews.product_id')
                          ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                          ->groupBy('products.id')
                          ->orderBy('numberOfReview', 'desc')
                          ->get();
        
        // $products = Product::all();

        
        return view('products.sortByMostReviewed', ['products' => $products]);
    }
    
    public function avgRatingDESC() {
        /*
            Select product, count number product and calculate avergae of rating, order by number of reviews in descending order
        */
        
        $products = Product::selectRaw('products.*, count(reviews.id) as numberOfReview, avg(reviews.rating) as AvgRating, reviews.product_id')
                          ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                          ->groupBy('products.id')
                          ->orderBy('AvgRating', 'desc')
                          ->get();
        
        
        return view('products.sortByRating', ['products' => $products]);
    }
}
