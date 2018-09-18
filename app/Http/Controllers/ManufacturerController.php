<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Manufacturer;
use App\Country;
use DB;

class ManufacturerController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
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
        
        // $product_counts = DB::table('products')
        //             ->select('id', DB::raw('count(id) as total'))
        //             ->groupBy('manufacturer_id')
        //             ->get();
        //dd($product_counts);
        // $product_counts = Product::with('manufacturer')
        //                 ->select(DB::raw('count(id) as total'))
        //                 ->groupBy('manufacturer_id')
        //                 ->get();
        //dd($product_counts);
        $products = Product::all();
        
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
        return view('manufacturers.create_form')->with('manufacturers', Manufacturer::all())->with('countries', Country::all());
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
}
