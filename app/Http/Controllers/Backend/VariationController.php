<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VariationController extends Controller
{



        public function index()
        {
            $variations = Variation::all();
            return view('backend.variations.index', compact('variations'));
        }

        public function create()
        {
            return view('backend.variations.create');
        }

        public function store(Request $request)
        {
            $variation = new Variation();
            $variation->product_id = $request->product_id;
            $variation->size = $request->size;
            $variation->color = $request->color;
            $variation->price = $request->price;
            $variation->save();
            return redirect()->route('variations.index')->with('message', 'Variation created successfully.');
        }

        public function edit($id)
        {
            $variation = Variation::find($id);
            return view('backend.variations.edit', compact('variation'));
        }

        public function update(Request $request, $id)
        {
            $variation = Variation::find($id);
            $variation->product_id = $request->product_id;
            $variation->size = $request->size;
            $variation->color = $request->color;
            $variation->price = $request->price;
            $variation->save();
            return redirect()->route('variations.index')->with('message', 'Variation updated successfully.');
        }


        public function destroy($id)
        {
            $variation = Variation::find($id);
            $variation->delete();
            return redirect()->route('variations.index')->with('message', 'Variation deleted successfully.');
        }




}
