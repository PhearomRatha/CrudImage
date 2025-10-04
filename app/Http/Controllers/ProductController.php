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

    // fuck u bro don't forget my 10$ for fixed this error =>
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

                $data['image'] = asset('storage/'.$path);
            }

            Product::create($data);

            return redirect('/add')->with('success', 'Add product success');
        } catch (\Throwable $th) {
            return redirect('/add')->with('error', 'Add product not success');
        }
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return redirect('/dashboard');

    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'price' => 'required|numeric',
                'image' => 'nullable|image',
            ]);

            $pro = $this->show($id);
            $pro->name = $request->name;
            $pro->price = $request->price;

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('upload', 'public');
                $pro->image = asset('storage/'.$path);
            }

            $pro->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Product updated successfully',
                'product' => $pro,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
