<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Repositories\Product\ProductRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProductController extends BaseController
{

    protected ProductRepositoryInterface $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        $data = $this->productRepository->index();
        foreach ($data as $d) {
            $response[]=[
                'id' => $d->id,
                'name' => $d->name,
                'status' => $d->status,
                'description' => $d->description,
                'price' => $d->price,
                'image' => $d->image,
                'category_name' => $d->category ? $d->category->name : null,
            ];
        }
        return $this->sendResponse($response, 'Product retrived successfully!', 200);
    }


    public function store(Request $request)
    {
        $validateProduct = Validator::make($request->all(), [
            'name' => 'required|string',
            'status' => 'nullable',
            'description' => 'required|string',
            'price' => 'required|integer',
            'image' => 'nullable|mimes:jpeg,png,jpg|dimensions:min_width=100,min_height=100',
            'category_id' => 'required',
        ]);

        if ($validateProduct->fails()) {
            return $this->error('Validation Error', $validateProduct->errors(), 422);
        }

        $product = $this->productRepository->store($request->all());
        return $this->sendResponse($product, 'Product created successfully', 201);
    }


    public function show(string $id)
    {
        $product = $this->productRepository->show($id);

        if (!$product) {
            return $this->error('Product not Found', null, 404);
        }

        return $this->sendResponse($product, 'Product show successfully', 200);
    }


    public function update(Request $request, string $id)
    {
        $validateProduct = Validator::make($request->all(), [
            'name' => 'required|string',
            'status' => 'nullable',
            'description' => 'required|string',
            'price' => 'required|integer',
            'image' => 'nullable|mimes:jpeg,png,jpg|dimensions:min_width=100,min_height=100',
            'category_id' => 'required',
        ]);
        if ($validateProduct->fails()) {
            return $this->error('Validation Error', $validateProduct->errors(), 422);
        }

        $product = $this->productRepository->show($id);

        if (!$product) {
            return $this->error('Product not found', null, 404);
        }

        $product->update($request->all());
        return $this->sendResponse($product, 'Product updated successfully', 200);
    }


    public function destroy(string $id)
    {
        $product = $this->productRepository->show($id);

        if (!$product) {
            return $this->error('Product not found', null, 404);
        }

        $product->delete();

        return $this->sendResponse($product, 'Product deleted successfully', 200);
    }
}
