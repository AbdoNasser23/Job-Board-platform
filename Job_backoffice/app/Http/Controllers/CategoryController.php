<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\JobCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quiry = JobCategory::latest();

        $categories = $quiry->paginate(10);

        return view("category.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {
        $category = new JobCategory();
        $category->name = $request->input('name');
        $category->save();

        return to_route('categories.index')->with('success','Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobCategory $category)
    {
        return view("category.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request,  JobCategory $category)
    {
        $category->name = $request->input("name");
        $category->save();
        return to_route("categories.index")->with("success","Category updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobCategory $category)
    {
        $category->delete();
        return to_route("categories.index")->with("success","Category archived successfully!");
    }


    public function archived(JobCategory $category)
    {
        $categories = $category->onlyTrashed()->paginate(10);
        return view("category.archived", compact("categories"));
    }

    public function restore(JobCategory $category)
    {
        $category->restore();
        return to_route("categories.index")->with("success","Category restored successfully.");
    }

}
