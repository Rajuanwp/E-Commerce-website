<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\HeroSlider;
use Illuminate\Support\Str;
use Image;
use file;


class HeroSliderController extends Controller
{

    public function index()
    {
     return view('backend.pages.slider.slider');
    }


    public function store(Request $request)
    {

        if($request->image){
            $image=$request->file('image');
            $customeName=rand().".".$image->getClientOriginalExtension();
            $location=public_path('backend/heroSlider/'.$customeName);
            Image::make($image)->save($location);
         }

         $slider=new HeroSlider();
         $slider->title = $request->title;
         $slider->description = $request->description;
         $slider->slug = $request->slug;
         $slider->status = $request->status;
         $slider->image = $customeName;
         $slider->save();
         return redirect()->route('sliderShow')->with('message','Data added Successfully');
        // dd($slider);
        // dd($company_info);
    }


    public function show()
    {
        $allSlider= HeroSlider::all();
         return view('backend.pages.slider.allSlider',compact('allSlider'));
    }

    public function edit($id)
    {
       $sliderEdit= HeroSlider::find($id);
       return view('backend.pages.slider.editSlider',compact('sliderEdit'));
    }


    public function update(Request $request)
    {
        // return $request->id;


        if($request->image){
            $image=$request->file('image');
            $customeName=rand().".".$image->getClientOriginalExtension();
            $location=public_path('backend/heroSlider/'.$customeName);
            Image::make($image)->save($location);
         }



        $sliderUpdate= HeroSlider::find($request->id);
        $sliderUpdate->title=$request->title;
        $sliderUpdate->description=$request->description;
        $sliderUpdate->slug=$request->slug;
        $sliderUpdate->image = $customeName;
        $sliderUpdate->save();
        return redirect()->route('sliderShow')->with('message','Data Update Successfully');

        // dd($request->id);
    }

    public function destroy($id)
    {
        $sliderDelete= HeroSlider::find($id);
        $sliderDelete->delete();
        return redirect()->back()->with('message','Delete Successfully');
    }


    public function status($id)
    {
        $allCard= HeroSlider::find($id);

        if($allCard->status==1){

            $allCard->status=2;
        }
        else{
            $allCard->status=1;
        }
        $allCard->update();
        return redirect()->back()->with('message','Status Update Successfully');

    }
}
