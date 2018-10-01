<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Manufacturer;
use App\Country;
use Illuminate\Support\Facades\Auth;
use DB;

class ManufacturerController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show', 'sortByNumbersOfReviews', 'sortByAverageRating', 'sortByBrand']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $manufacturers = Manufacturer::all();
        
        $products = Product::selectRaw('products.*, count(reviews.id) as numberOfReview, avg(reviews.rating) as AvgRating, reviews.product_id')
                          ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                          ->groupBy('products.id')
                          ->paginate(5);
        // dd($products);
        
        

        return view('manufacturers.index', ['manufacturers' => $manufacturers, 'products' => $products]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth::user()->isAdmin()) {
            return view('manufacturers.create_form')->with('manufacturers', Manufacturer::all())->with('countries', Country::all());
        } else {
            
            session()->flash('danger', 'You do not have right to add a manufacturer.');
             
        }
        return redirect()->back();
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
                "manufacturer_name" => "required | max:100 | unique:manufacturers",
                'country' =>'exists:countries,id'

        ]);
        
        $manufacturer = new Manufacturer();
        $manufacturer->manufacturer_name = $request->manufacturer_name;
        $manufacturer->country_id = $request->country;
        $manufacturer->save();
        return redirect("/product/create");
        
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
        $manufacturer = Manufacturer::find($id);
        $products = Product::where('manufacturer_id','=',$id)->get();
        // dd($manufacturer);
        // $country = Country::all();
        return view('manufacturers.show', ['manufacturer' => $manufacturer, 'products' => $products]);
    }
// $result = Post::whereId($id)->get();
//         $comments = Comment::where('post_id','=',$id)->orderBy('created_at','desc')->paginate(6);
//         return view('showPost', ['result'=>$result, 'comments'=>$comments]);
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    
    public function sortByNumbersOfReviews() {
        //This is to be used on the side bar to list all brands
        $manufacturers = Manufacturer::all();
        
        //This function is used to sort by numbers of reviews in desceding order
        $products = Product::selectRaw('products.*, count(reviews.id) as numberOfReview, avg(reviews.rating) as AvgRating, reviews.product_id')
                          ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                          ->groupBy('products.id')
                          ->orderBy('numberOfReview', 'desc')
                          ->paginate(5);
        
        

        return view('manufacturers.sortNumberOfReviews', ['manufacturers' => $manufacturers, 'products' => $products]);
    }
    
    public function sortByAverageRating() {
        
        //This is to be used on the side bar to list all brands
        $manufacturers = Manufacturer::all();
        
        //This function is used to sort by average rating in desceding order
        $products = Product::selectRaw('products.*, count(reviews.id) as numberOfReview, avg(reviews.rating) as AvgRating, reviews.product_id')
                          ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                          ->orderBy('AvgRating', 'desc')
                          ->groupBy('products.id')
                          
                          ->paginate(5);
        
        
        

        return view('manufacturers.sortAverageRating', ['manufacturers' => $manufacturers, 'products' => $products]);
    }
    
    public function sortByBrand() {
        
        //This is to be used on the side bar to list all brands
        $manufacturers = Manufacturer::all();
        
        //This function is used to sort by manufacturer name in ascending order
        $products = Product::selectRaw('products.*, count(reviews.id) as numberOfReview, avg(reviews.rating) as AvgRating, reviews.product_id')
                          ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                          ->leftJoin('manufacturers', 'manufacturer_id', '=', 'manufacturers.id')
                          ->orderBy('manufacturers.manufacturer_name', 'asc')
                          ->groupBy('products.id')
                          ->paginate(5);
        
        
        

        return view('manufacturers.sortByBrand', ['manufacturers' => $manufacturers, 'products' => $products]);
    }
    
}
