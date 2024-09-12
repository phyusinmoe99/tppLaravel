<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
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


    public function store(ProductRequest $request)
    {
        //dd($request);

        $data = $request->validated();
        $data['status'] = $request->has('status')? true : false;
        Product::create($data);
        return redirect()->route('products.index');
    }




    public function edit($id)
    {
        //dd($id);
        $product = Product::where('id',$id)->first();
        //dd($products);
        return view('products.edit',compact('product'));
    }


    public function update(ProductRequest $request)
    {
        //dd($request->id);
        $product = Product::where('id',$request->id)->first();
        $updateData = $request->validated();
        $updateData['status']=$request->has('status') ? true : false;
        $product->update($updateData);
        return redirect()->route('products.index');

    }


    public function destroy($id)
    {
        $product = Product::where('id',$id)->first();
        $product->delete();

        return redirect()->route('products.index');

    }
}
