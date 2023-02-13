<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use App\Models\Backend\OurClients;
use App\Models\Backend\MavMenu;
use App\Models\Backend\Product;
use App\Models\Backend\MultiImg;
// use App\Models\Backend\OurClients;

class HomeController extends Controller
{


    public function index()
    {

        $OurClient = OurClients::where('status',1)->limit(12)->latest()->get();
        $categories = Category::whereNull('parent_id')->where('status',1)->with('children')->get();
        $categorieimg = Category::all();
        $allcategory = Category::orderBy('name','ASC')->where('status',1)->with('children')->get();
        $AllNavMenu = MavMenu::whereNull('parent_id')->where('status',1)->with('children')->get();
        $allProduct = Product::where('status',1)->orderBy('created_at','DESC')->get()->take(8);
        $allProducts= Product::where('status',1)->where('best_Seller',1)->orderBy('id','ASC')->limit(10)->get();
        $featured   = Product::where('status',1)->where('featured',1)->orderBy('id','ASC')->limit(10)->get();
        $Clothing_Apparel= Product::where('status',1)->orderBy('id','ASC')->limit(2)->latest()->get();
        $multiImage = MultiImg::all();

        $category_0 =Category::skip(0)->first();
        $Fashion=Product::where('status',1)->where('category_id',$category_0->id)->OrderBy('id','DESC')->limit(10)->get();

        $category_10 =Category::skip(10)->first();
        $Electronics=Product::where('status',1)->where('category_id',$category_10->id)->OrderBy('id','DESC')->limit(10)->get();

        $category_5 =Category::skip(5)->first();
        $Home_Garden_Kitchen=Product::where('status',1)->where('category_id',$category_5->id)->OrderBy('id','DESC')->limit(10)->get();

        $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->where('status',1)->orderBy('id','DESC')->limit(10)->get();

        // $special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(3)->get();

// dd($hot_deals);
        return view('frontend.index',compact('categories','AllNavMenu','allProduct','allProducts','featured','Clothing_Apparel','OurClient','multiImage','allcategory','categorieimg','category_0','Fashion','category_10','Electronics','Home_Garden_Kitchen','category_5','Home_Garden_Kitchen','hot_deals'));
    }





    public function ProductDetails($product_code,$slug){
        $product = Product::where('product_code', $product_code)->where('product_slug', $slug)->first();


        if ($product == NULL) {
            return view('frontend.pages.error')->with('error', 'Product not found');
            // dd($product);
        }

        $color = $product->product_color;
        $product_color = explode(',', $color);
        $size = $product->product_size;
        $product_size = explode(',', $size);
        $multiImage = MultiImg::where('product_id',$product->id)->get();
        $categories = Category::whereNull('parent_id')->where('status',1)->with('children')->get();
        return view('frontend.pages.singleproduct',compact('product','categories','product_color','product_size','multiImage'));


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
