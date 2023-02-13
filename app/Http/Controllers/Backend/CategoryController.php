<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use Image;
use file;

class CategoryController extends Controller
{


    public function index()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('backend.pages.category.index',compact('categories'));
    }



    public function store(Request $request)
    {



        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('backend/category/'.$name_gen);
        $save_url = $name_gen;

        // creating a new category
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status =  $request->status;
        $category->image = $save_url;
        $category->parent_id = $request->parent_id;
        $category->save();

        // redirecting back to the index page
        return redirect()->route('categoriesIndex')->with('message', 'Category created successfully!');
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.pages.category.create', compact('categories'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.pages.category.edit', compact('category'));
    }




    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',
        ]);


        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        // if($oldImage ){
        //     unlink(public_path($category->image));
        // }
        $category->status = $request->status;
        $category->save();

        return redirect()->route('categoriesIndex')->with('message', 'Category updated successfully!');
    }


    public function editSubcategory($id)
{
    $subcategory = Category::findOrFail($id);
    $categories = Category::whereNull('parent_id')->get();

    return view('backend.pages.category.subEdit', compact('subcategory', 'categories'));
}


public function updateSubcategory(Request $request, $id)
{
    $subcategory = Category::findOrFail($id);
    $subcategory->fill($request->all());
    $subcategory->save();

    return redirect()->route('categoriesIndex');
}



public function destroy($id)
{
    $category = Category::find($id);
    if ($category) {
        $subcategories = Category::where('parent_id', $id)->get();
        // dd($subcategories);
        foreach($subcategories as $subcategory) {
            $subcategory->parent_id = null;
            $subcategory->save();
        }
        $category->delete();
        return redirect()->route('categoriesIndex')->with('message', 'Category deleted successfully');
    }
    else {
        return redirect()->route('categoriesIndex')->with('error', 'Category not found');
    }
}



// public function subDelete($id)
// {
//     $category = Category::find($id);
//     if ($category) {
//         if ($category->children()->count() > 0) {
//             foreach ($category->children as $child) {
//                 $child->parent_id = $category->parent_id;
//                 $child->save();
//             }
//         }
//         $category->delete();
//         return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
//     } else {
//         return redirect()->route('categories.index')->with('error', 'Category not found');
//     }
// }

public function subDelete($id)
{
    $category = Category::findOrFail($id);
    if ($category->children()->count() > 0) {
        foreach ($category->children as $child) {
            $child->parent_id = $category->parent_id;
            $child->save();
        }
    }
    $category->delete();

    return redirect()->route('categoriesIndex')->with('success', 'Category deleted successfully');
}








//Category Status Update

public function status($id){

    $categorystatus= Category::find($id);

    if($categorystatus->status==1){

        $categorystatus->status=2;
    }
    else{
        $categorystatus->status=1;
    }
    $categorystatus->update();
    return redirect()->back()->with('message','Status Update Successfully');

}

public function substatus($id){

    // $allCard= Category::find($id);
    $subcategory = Category::findOrFail($id);
    $categories = Category::whereNull('parent_id')->get();

    if($subcategory->status==1){

        $subcategory->status=2;
    }
    else{
        $subcategory->status=1;
    }
    $subcategory->update();
    return redirect()->back()->with('message','Status Update Successfully');

}


}







