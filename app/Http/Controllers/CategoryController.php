<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\CategoryAttachment;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        // $this->middleware('auth');
        $this->categoryRepository=$categoryRepository;
    }

    public function index()
    {
        $category = $this->categoryRepository->index();
        return view('categories.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
       $data =$request->validated();
       $category = Category::create($data);
       if($request->hasFile('images')){
        //  dd($request->file('images'));
        foreach ($request->file('images') as $image) {

            $categoryImageName = time() . '.' . $image->getClientOriginalName();
            $image->storeAs('CategoryImages' , $categoryImageName);
            CategoryAttachment::create([
                'category_id' =>$category->id,
                'image'=>$categoryImageName,
            ]);

        }
       }
        return redirect()->route('categories.index');
    }


    public function edit($id)
    {
        $category = $this->categoryRepository->show($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $category = $this->categoryRepository->show($request->id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index');
    }


    public function destroy($id)
    {

        $category = $this->categoryRepository->show($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
