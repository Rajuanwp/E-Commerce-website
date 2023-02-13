<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Colour;

class ColourConroller extends Controller
{

    public function index()
    {
        return view('backend.pages.colour.create');
    }



    public function store(Request $request)
    {

     $colour=explode(',',$request->colour);
     $ColourInfo=new Colour();
     $ColourInfo->colour = json_encode($colour);
     $ColourInfo->status = $request->status;
     $ColourInfo->save();
     return redirect()->route('ShowColour')->with('message','Colour added Successfully');
    }

    public function show()
    {
        $ColourInfo= Colour::all();
        return view('backend.pages.colour.manage',compact('ColourInfo'));

    }

    public function status($id)
    {
        $ColourStatus= Colour::find($id);

        if($ColourStatus->status==1){

            $ColourStatus->status=2;
        }
        else{
            $ColourStatus->status=1;
        }
        $ColourStatus->update();
        return redirect()->back()->with('message','Status Update Successfully');

    }


    public function edit($id)
    {
        $editColour= Colour::find($id);


        return view('backend.pages.colour.edit',compact('editColour'));
    }



    public function update(Request $request) {

        $colour=explode(',',$request->colour);
        $updateSize= Colour::find($request->id);
        $updateSize->colour = json_encode($colour);
        $updateSize->status = $request->status;
        $updateSize->update();
        // dd($updateSize);
        return redirect()->route('ShowColour')->with('message','Information Update Successfully');
    }



    public function destroy($id)
    {
        $SizeInfo= Colour::find($id);
        $SizeInfo->delete();
        return redirect()->back()->with('message','Delete Successfully');
    }

}
