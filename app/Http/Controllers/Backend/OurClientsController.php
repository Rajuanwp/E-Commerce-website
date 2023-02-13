<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\OurClients;
use Image;
use File;

class OurClientsController extends Controller
{

    public function index()
    {
        return view('backend.pages.ourClients.addClients');
    }

    public function store(Request $request)
    {
        if($request->logo){
            $image=$request->file('logo');
            $customeName=time().".".$image->getClientOriginalExtension();
            $location=public_path('backend/OurClients/'.$customeName);
            Image::make($image)->save($location);
         }

         $clientInfo=new OurClients();
         $clientInfo->name = $request->name;
         $clientInfo->description = $request->description;
         $clientInfo->logo = $customeName;
         $clientInfo->status = $request->status;
         $clientInfo->save();
         return redirect()->route('allClients')->with('message','Data added Successfully');

    }


    public function show()
    {
        $ClintAllInfo= OurClients::all();
        return view('backend.pages.ourClients.allClients',compact('ClintAllInfo'));
    }


    public function status($id)
    {
        $allCard= OurClients::find($id);

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
        $editClient= OurClients::find($id);

        return view('backend.pages.ourClients.editClient',compact('editClient'));
    }



    public function update(Request $request) {
        // dd($request->logo);

        if($request->logo){
            $image=$request->file('logo');
            $customeName=time().".".$image->getClientOriginalExtension();

            $location=public_path('backend/OurClients/'.$customeName);
            Image::make($image)->save($location);
        }else{
            $customeName='';
        }


        $updateClient= OurClients::find($request->id);
        // dd($request->id);

        $updateClient->name=$request->name;
        $updateClient->description=$request->description;
        $updateClient->logo=$customeName;
        $updateClient->update();
        return redirect()->route('allClients')->with('message','Data Update Successfully');
    }

    public function destroy($id)
    {
        $clientdelete= OurClients::find($id);
        $clientdelete->delete();
        return redirect()->back()->with('message','Delete Successfully');
    }
}
