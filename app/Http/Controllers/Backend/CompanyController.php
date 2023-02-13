<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Company;
use Image;
use file;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('backend.pages.company.company_info');
    }

  
    public function store(Request $request)
    {
     if($request->logo){
        $image=$request->file('logo');
        $customeName=rand().".".$image->getClientOriginalExtension();
        $location=public_path('backend/company_logo/'.$customeName);
        Image::make($image)->save($location);
     }
     
     $company_info=new Company();
     $company_info->name = $request->name;
     $company_info->email = $request->email;
     $company_info->address = $request->address;
     $company_info->phone = $request->phone;
     $company_info->discrition = $request->discrition;
     $company_info->logo = $customeName;
     $company_info->save();
     return redirect()->route('show_company')->with('message','Data added Successfully');
    // dd($company_info);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $company_info_list=Company::all();

        return view('backend.pages.company.company_info_list',compact('company_info_list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company_info_edit = Company::find($id);
        return view('backend.pages.company.company_edit', compact('company_info_edit'));
    
    }


    public function update(Request $request) {

        if($request->logo){
            $image=$request->file('logo');
            $customeName=time().".".$image->getClientOriginalExtension();
            $location=public_path('backend/company_logo/'.$customeName);
            Image::make($image)->save($location);
        }
        else{
            $customeName='';
        }

   
        $updateCompany= Company::find($request->id); 
        $updateCompany->name = $request->name;
        $updateCompany->email = $request->email;
        $updateCompany->address = $request->address;
        $updateCompany->phone = $request->phone;
        $updateCompany->discrition = $request->discrition;
        $updateCompany->logo=$customeName;
        $updateCompany->update();
        return redirect()->route('show_company')->with('message','Information Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Companytdelete= Company::find($id);
        $Companytdelete->delete();
        return redirect()->back()->with('message','Delete Successfully');
    }
}
