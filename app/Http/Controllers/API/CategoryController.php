<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends BaseController
{
    private CategoryRepositoryInterface $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        // $data = Category::get();
        $data = $this->categoryRepository->index();

        return $this->sendResponse($data, 'Category retrived successfully', 200);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',

        ]);
        if ($validator->fails()) {
            return $this->error('Validation Error', $validator->errors(), 422);
        }
        // $category = Category::create([
        //     'name' => $request->name,
        // ]);
        $category = $this->categoryRepository->store($request->all());
        return $this->sendResponse($category, 'Category created successfully', 201);
    }


    public function show(string $id)
    {
        // $data = Category::find($id);
        $data = $this->categoryRepository->show($id);
        if (!$data) {
            return $this->error('Category Not Found', null, 404);
        }
        return $this->sendResponse($data, "Category show successfully", 200);
    }



    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->error('Validation Error', $validator->errors(), 422);
        }
        // $category = Category::find($id);
        $category = $this->categoryRepository->show($id);

        if (!$category) {
            return $this->error('Category Not Found', null, 404);
        }

        $category->update($request->all());

        return $this->sendResponse($category, 'Category updated successfully', 200);
    }


    public function destroy(string $id)
    {
        // $category = Category::where('id', $id)->first();
        $category = $this->categoryRepository->show($id);


        if (!$category) {
            return $this->error('Category Not Found', null, 404);
        }
        $category->delete();
        return $this->sendResponse($category, 'Category deleted successfully', 200);
    }
}
