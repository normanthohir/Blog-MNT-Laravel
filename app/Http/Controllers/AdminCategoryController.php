<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;



class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:categories,name,',
            'slug' => 'required|unique:categories'
        ]);

        Category::create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'New category has been added');
    }


    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $rules = [
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
            'slug' => 'required|unique:categories,slug,' . $category->id
        ];

        $validatedData = $request->validate($rules);

        $category->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $category->delete();

        return redirect('/dashboard/categories')->with('success', 'Category has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
