<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Brand;
use Image;
use file;

class BrandController extends Controller
{

    public function index()
    {
        return view('backend.pages.brand.addBrand');
    }



    public function store(Request $request)
    {
     if($request->logo){
        $image=$request->file('logo');
        $customeName=rand().".".$image->getClientOriginalExtension();
        $location=public_path('backend/Brand/'.$customeName);
        Image::make($image)->save($location);
     }

     $BrandInfo=new Brand();
     $BrandInfo->name = $request->name;
     $BrandInfo->des = $request->des;
     $BrandInfo->status = $request->status;
     $BrandInfo->logo = $customeName;
    //  dd($BrandInfo);
     $BrandInfo->save();
     return redirect()->route('showBrand')->with('message','Brand added Successfully');

    }



    public function show()
    {
        $BrandInfo= Brand::all();
        return view('backend.pages.brand.allBrand',compact('BrandInfo'));


    }
    public function status($id){

        $BrandInfo= Brand::find($id);

        if($BrandInfo->status==1){

            $BrandInfo->status=2;
        }
        else{
            $BrandInfo->status=1;
        }
        $BrandInfo->update();
        return redirect()->back()->with('message','Status Update Successfully');

    }


    public function edit($id)
    {
        $editBrand= Brand::find($id);

        return view('backend.pages.Brand.editBrand',compact('editBrand'));
    }



    public function update(Request $request) {
        // dd($request->logo);

        if($request->logo){
            $image=$request->file('logo');
            $customeName=time().".".$image->getClientOriginalExtension();

            $location=public_path('backend/Brand/'.$customeName);
            Image::make($image)->save($location);
        }else{
            $customeName='';
        }


        $updateBrand= Brand::find($request->id);
        // dd($request->id);

        $updateBrand->name=$request->name;
        $updateBrand->des=$request->des;
        $updateBrand->logo=$customeName;
        $updateBrand->update();
        return redirect()->route('showBrand')->with('message','Information Update Successfully');
    }

    public function destroy($id)
    {
        $BrandInfo= Brand::find($id);
        $BrandInfo->delete();
        return redirect()->back()->with('message','Delete Successfully');
    }
}
