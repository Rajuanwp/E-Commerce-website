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
        $categories = Category::whereNull('parent_id')->where('status',1)->with('children')->get();
        return view('backend.pages.category.index',compact('categories'));
    }



    public function store(Request $request)
    {


        //validating the input fields
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'status' => 'nullable|integer|',
        ]);

        // if($request->icon){
        //     $image=$request->file('icon');
        //     $customeName=time().".".$image->getClientOriginalExtension();
        //     $location=public_path('backend/category/'.$customeName);
        //     Image::make($image)->save($location);
        //  }

        // creating a new category
        $category = new Category();
        $category->name = $validatedData['name'];
        $category->status =  $validatedData['status'];
        // $category->image = $customeName;
        $category->parent_id = $validatedData['parent_id'];
        $category->save();

        // redirecting back to the index page
        return redirect()->route('categoriesIndex')->with('message', 'Category created successfully!');
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.pages.category.create', compact('categories'));
    }



    // public function edit($id)
    // {
    //     $category = Category::find($id);
    //     return view('categories.edit', compact('category'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $category = Category::find($id);
    //     $category->name = $request->name;
    //     $category->parent_id = $request->parent_id;
    //     $category->status = $request->status;
    //     $category->save();
    //     return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    // }


    // public function delete($id)
    // {
    //     $category = Category::find($id);
    //     $category->delete();
    //     return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    // }






    // public function destroy(Category $category)
    // {
    //     $category->delete();
    //     return redirect()->route('categoriesIndex')->with('message', 'Category deleted successfully');
    // }


    // public function edit(Category $category)
    // {
    //     return view('categories.edit', compact('category'));
    // }

    // public function update(Request $request, Category $category)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $category->update($request->all());
    //     return redirect()->route('categories.index')->with('message', 'Category updated successfully');
    // }

//Edit and Update


    // public function edit(Category $category)
    // {
    //     return view('categories.edit', compact('category'));
    // }

    // public function update(Request $request, Category $category)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $category->update($request->all());
    //     return redirect()->route('categoriesIndex')->with('message', 'Category updated successfully');
    // }



    // public function destroy(Category $category)
    // {
    //     $category->delete();
    //     return redirect()->route('categoriesIndex')->with('message', 'Category deleted successfully');
    // }



}







