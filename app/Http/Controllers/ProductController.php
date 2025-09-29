<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index()
    {
        $pro = Product::orderBy('id', 'asc')->get();
        return view('pages.viewProduct', compact('pro'));
    }

    public function add(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'price' => 'required|numeric',
                'image' => 'required|image',
            ]);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('upload', 'public');

                $data['image'] = asset('storage/' . $path);
            }

            Product::create($data);

            return redirect('/add')->with('success', 'Add product success');
        } catch (\Throwable $th) {
            return redirect('/add')->with('error', 'Add product not success');
        }
    }
}
