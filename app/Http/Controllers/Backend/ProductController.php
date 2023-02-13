<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use App\Models\Backend\Category;
use App\Models\Backend\Brand;
use App\Models\Backend\Colour;
use App\Models\Backend\Size;
use App\Models\Backend\MultiImg;
use Carbon\Carbon;
use Image;
use file;


class ProductController extends Controller
{

    public function index(){
        $allProduct= Product::all();
        return view('backend.pages.products.index',compact('allProduct'));

    }


    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('backend.pages.products.create', compact('categories', 'brands', ));
    }


    public function store(Request $request)
    {
            // dd($request);
        // $image = $request->file('product_thambnail');
        // $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        // Image::make($image)->resize(800,800)->save('Backend/product/'.$name_gen);
        // $save_url = $name_gen;

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('Backend/product/'.$name_gen);
        $save_url = 'Backend/product/'.$name_gen;


        $allProduct = Product::insertGetId([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'best_Seller' => $request->best_Seller,
            'most_populer' => $request->most_populer,
            'product_thambnail' => $save_url,
            'vendor_id' => $request->vendor_id,
            'status' => $request->status,
            'created_at' => Carbon::now(),

        ]);


        $images = $request->file('multi_img');
        foreach($images as $img){
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(800,800)->save('Backend/product/multi-img/'.$make_name);
        $uploadPath = 'Backend/product/multi-img/'.$make_name;



        MultiImg::insert([

            'product_id' => $allProduct,
            'photo_name' => $uploadPath,
            'created_at' => Carbon::now(),

        ]);
        }

        // dd($allProduct);
        return redirect()->route('ShowProduct')->with('message','Product Store Successfully');
    //  return $product_id;

    }



    public function edit($id)
    {
        $multiImgs=MultiImg::where('product_id',$id)->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.pages.products.edit',compact('brands','categories','products','multiImgs'));
    }



    public function status($id){

        $categorystatus= Product::find($id);

        if($categorystatus->status==1){

            $categorystatus->status=2;
        }

        else{
            $categorystatus->status=1;
        }
        $categorystatus->update();
        return redirect()->back()->with('message','Status Update Successfully');

    }


    public function update(Request $request) {
        $product_id = $request->id;
        $oldImage = $request->old_img;
        $product = Product::find($request->id);

        if ($request->hasFile('product_thambnail')) {
            $image = $request->file('product_thambnail');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(800,800)->save(public_path('backend\product\\'.$name_gen));
            $save_url = 'Backend/product/'.$name_gen;

            if ($oldImage) {
                unlink(public_path($product->product_thambnail));
            }
        } else {
            $save_url = $oldImage;
        }

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'best_Seller' => $request->best_Seller,
            'most_populer' => $request->most_populer,
            'product_thambnail' => $save_url,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('ShowProduct')->with('message','Product Update Successfully');

    }


    public function updateMultiImg(Request $request){

        $imgs = $request->multi_img;

        foreach($imgs as $id => $img ){
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

   $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(800,800)->save('Backend/product/multi-img/'.$make_name);
        $uploadPath = 'Backend/product/multi-img/'.$make_name;

        MultiImg::where('id',$id)->update([
            'photo_name' => $uploadPath,
            'updated_at' => Carbon::now(),

        ]);
        return redirect()->back()->with('message','Multi Images Update SuccessFully');
        } // end foreach



        }

        public function multipaleImgDel($id){

            $oldImg = MultiImg::findOrFail($id);
            unlink($oldImg->photo_name);
            MultiImg::findOrFail($id)->delete();
            return redirect()->back()->with('message','Multi Images Update SuccessFully');
        }

        public function productdelete($id){

            $product = Product::findOrFail($id);
            unlink($product->product_thambnail);
            Product::findOrFail($id)->delete();

            $imges = MultiImg::where('product_id',$id)->get();
            foreach($imges as $img){
                unlink($img->photo_name);
                MultiImg::where('product_id',$id)->delete();
            }

           return redirect()->back()->with('message','Product Delete SuccessFully');
        }



    }




