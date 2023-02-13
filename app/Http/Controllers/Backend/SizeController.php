<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Size;

class SizeController extends Controller
{

    public function index()
    {
        return view('backend.pages.Size.addSize');
    }



    public function store(Request $request)
    {

     $sizes=explode(',',$request->size);
     $SizeInfo=new Size();
     $SizeInfo->size = json_encode($sizes);
     $SizeInfo->status = $request->status;
     $SizeInfo->save();
     return redirect()->back()->with('message','Brand added Successfully');
// return back();

    }



    public function show()
    {
        $SizeInfo= Size::all();
        return view('backend.pages.Size.manageSize',compact('SizeInfo'));


    }

    public function status($id)
    {
        $allCard= Size::find($id);

        if($allCard->status==1){

            $allCard->status=2;
        }
        else{
            $allCard->status=1;
        }
        $allCard->update();
        return redirect()->back()->with('message','Status Update Successfully');

    }


    public function edit($id)
    {
        $editSize= Size::find($id);
        $productSize= Size::all()->where('size');

        return view('backend.pages.Size.edit',compact('editSize'));
    }



    public function update(Request $request) {

        $sizes=explode(',',$request->size);
        $updateSize= Size::find($request->id);
        $updateSize->size=$request->name;
        $updateSize->size = json_encode($sizes);
        $updateSize->status = $request->status;
        $updateSize->update();
        // dd($updateSize);
        return redirect()->route('ShowSize')->with('message','Information Update Successfully');
    }



    public function destroy($id)
    {
        $SizeInfo= Size::find($id);
        $SizeInfo->delete();
        return redirect()->back()->with('message','Delete Successfully');
    }


}
