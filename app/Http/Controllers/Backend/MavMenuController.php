<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\MavMenu;

class MavMenuController extends Controller
{
    public function index()
    {
        $categories = MavMenu::whereNull('parent_id')->where('status',1)->with('children')->get();
        return view('backend.pages.NavMenu.index',compact('categories'));
    }


    public function store(Request $request)
    {


        $card_info= MavMenu::insert([
            'name'=> $request->name,
            'parent_id'=> $request->parent_id,
            'status'=> $request->status,

        ]);
        return redirect()->route('NavMenuIndex')->with('message', 'NavMenu created successfully!');

    }

    public function create()
    {
        $categories = MavMenu::all();
        return view('backend.pages.NavMenu.create', compact('categories'));
    }


public function destroy($id)
{
    $category = MavMenu::find($id);
    if ($category) {
        $subcategories = MavMenu::where('parent_id', $id)->get();
        // dd($subcategories);
        foreach($subcategories as $subcategory) {
            $subcategory->parent_id = null;
            $subcategory->save();
        }
        $category->delete();
        return redirect()->route('NavMenuIndex')->with('message', 'Category deleted successfully');
    }
    else {
        return redirect()->route('NavMenuIndex')->with('error', 'Category not found');
    }
}



public function subDelete($id)
{
    $subcategory = MavMenu::whereNotNull('parent_id')->find($id);
    if ($subcategory) {
        $subcategory->delete();
        return redirect()->route('NavMenuIndex')->with('message', 'Subcategory deleted successfully');
    }
    else {
        return redirect()->route('NavMenuIndex')->with('error', 'Subcategory not found');
    }
}

}
