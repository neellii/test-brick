<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(9);
        return view("admin.category.index", compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.category.create");
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route("admin.categories.index")->with("success","Категория успешно создана");
    }

     /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view("admin.category.show", compact("category"));
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("admin.category.edit", compact("category"));
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('admin.categories.index', $category->id)->with('success', 'Категория успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route("admin.categories.index")->with("success","Категория успешно удалена");
    }
}
