<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('admin.categories.create'); // Adjust the path if necessary

    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'kategori_name' => 'required|string|max:255', // Ensure you are validating 'kategori_name' instead of 'title'
        ]);
    
        Category::create([
            'kategori_name' => $request->kategori_name,
        ]);
    
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Display the specified resource.
    public function show(Category $category)
    {
        // Optional: implement if needed
    }

    // Show the form for editing the specified resource.
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'kategori_name' => 'required|string|max:255',
        ]);

        $category->update([
            'kategori_name' => $request->kategori_name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}