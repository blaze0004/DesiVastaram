<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = \App\Category::paginate(2);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = \App\Category::all();

        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|min:5',
            'slug' => 'required|min:5|unique:categories'
        ]);
        $categories = Category::create($request->only('title', 'slug', 'description'));
        $categories->childrens()->attach($request->parent_id);
        return redirect('admin/category')->with('message', 'Category added successfully');       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        $categories = Category::all();

        return view('admin.categories.create', ['categories' => $categories, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //

        $category->title = $request->title;
        $category->description = $request->description;
        $category->slug = $request->slug;

        $category->childrens()->detach();
        $category->childrens()->attach($request->parent_id);
        $saved = $category->save();

        return redirect('admin/category')->with('message', 'Category updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        if ($category->delete()) {
            return back()->with('message', 'Category Deleted successfully!');
        } else {
            return back()->with('message', 'Error occured during deletion!');
        }
    }
}
