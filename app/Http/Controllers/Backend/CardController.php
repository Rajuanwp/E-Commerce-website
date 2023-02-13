<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\CardSection;
use Image;
use file;

class CardController extends Controller
{

    public function index()
    {
        return view('backend.pages.card.addCard');
    }

    public function show(){

        $allCard= CardSection::all();
        return view('backend.pages.card.cardList',compact('allCard'));

    }



    public function store(Request $request)
    {

        $image = $request->file('icon');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('backend/card/'.$name_gen);
        $save_url = $name_gen;


         $card_info= CardSection::insert([
            'title'=> $request->title,
            'description'=> $request->description,
            'icon'=>$save_url,
            'status'=> $request->status,

        ]);
        return redirect()->back()->with('message','Data added Successfully');


    }

    public function status($id){

        $allCard= CardSection::find($id);

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
