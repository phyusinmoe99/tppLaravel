<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        // $this->middleware('auth');
        $this->productRepository = $productRepository;

    }
    public function index()
    {
        // $products = Product::all();
        $products = $this->productRepository->index();
        return view('products.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('products.create',compact('categories'));
    }


    public function store(ProductRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
        $data['status'] = $request->has('status') ? true : false;
        //dd($data);
        if ($request->hasFile('image')) {
            // dd($request->file('image'));
            $imageName = time() . '.' . $request->image->extension();
            // $request->image->move(public_path('product'), $imageName);
            $request->image->storeAs('productImages',$imageName);
            $data['image'] = $imageName;
           // $data = array_merge($data, ['image' => $imageName]);
        }
        Product::create($data);
        return redirect()->route('products.index');
    }




    public function edit($id)
    {
        //dd($id);
        $categories = Category::all();
        $product = $this->productRepository->show($id);
        //dd($products);
        return view('products.edit', compact('product','categories'));
    }


    public function update(ProductRequest $request)
    {
        //dd($request->id);
        $product = Product::where('id', $request->id)->first();
        $updateData = $request->validated();
        $updateData['status'] = $request->has('status') ? true : false;
        $product->update($updateData);
        return redirect()->route('products.index');
    }


    public function destroy($id)
    {
        $product = $this->productRepository->show($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}
