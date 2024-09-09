<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));

    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        Product::create([
            'name'=> $request->name,
            'status'=>$request->status,
            'description'=>$request->description,
            'price'=>$request->price,
        ]);
        return redirect()->route('products.index');
    }




    public function edit($id)
    {
        //dd($id);
        $product = Product::where('id',$id)->first();
        //dd($products);
        return view('products.edit',compact('product'));
    }


    public function update(Request $request, $id)
    {
        $product = Product::where('id',$id)->first();
        $product->update([
            'name'=> $request->name,
            'status'=>$request->status,
            'description'=>$request->description,
            'price'=>$request->price,

        ]);
        return redirect()->route('products.index');

    }


    public function destroy($id)
    {
        $product = Product::where('id',$id)->first();
        $product->delete();

        return redirect()->route('products.index');

    }
}
