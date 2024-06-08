<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display a listing of the categories.
    public function index()
    {
        $categories = Category::all();
        return view('Admin.pages.categories.index', compact('categories'));
    }

    // Show the form for creating a new category.
    public function create()
    {
        return view('Admin.pages.categories.create');
    }

    // Store a newly created category in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->only('name'));

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    // Display the specified category.
    public function show(Category $category)
    {
        return view('Admin.pages.categories.show', compact('category'));
    }

    // Show the form for editing the specified category.
    public function edit(Category $category)
    {
        return view('Admin.pages.categories.edit', compact('category'));
    }

    // Update the specified category in storage.
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->only('name'));

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    // Remove the specified category from storage.
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
