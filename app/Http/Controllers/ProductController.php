<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index(){
        $pro = Product::query()->orderBy('id','asc');
        return view('pages.viewProduct',compact('pro'));

    }

    public function add(Request $request){
        // dd($request->all());
       $data= $request->validate([
            'name'=>['required','string'],
            'price'=>['required','numeric'],
            'image'=>['required','image'],
        ]);

        $fileName= null;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $fileName=$file->getClientOriginalName();
            $file->move(public_path('/upload'),$fileName);


        }
           $pro = new Product();
           $pro->name=$data['name'];
           $pro->price=$data['price'];
           $pro->image=$fileName;
           $pro->save();


        if($pro){
            return redirect('/add')->with('success','Add product success');
        }else{
              return redirect('/add')->with('error','Add product not success');

       }



    }

}
