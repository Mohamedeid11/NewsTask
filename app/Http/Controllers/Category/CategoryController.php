<?php

namespace App\Http\Controllers\Category;

use App\Category;
use Gate;
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
        $categories = Category::paginate(10);
        $count = Category::count();

        return view('Category.index' , compact('categories' , 'count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('manage-category')) {
            return redirect()->route('category.index');
        }
        $this->validate($request , [
            'name'=>'sometimes|max:200|unique:categories',
        ]);

        Category::create($request->all());

        return back()->with('success' , 'The Category has Been Created Successfully !');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if (Gate::denies('manage-category')) {
            return redirect()->route('category.index');
        }
        $this->validate($request , [
            'name'=>'sometimes|max:200|unique:categories,name,' . $category->id,
        ]);

        $category->name = $request->name;
        $category->save();

        return back()->with('success' , 'The Category has Been Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Gate::denies('delete-category')) {
            return redirect()->route('category.index');
        }
        $category = Category::findOrFail($request->category);

        $category->delete();

        return back()->with('success' , 'The Category has Been Deleted Successfully !');
    }
}
