<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $categories = ProductCategory::all();
        return view('backend.productcategory.index', compact('categories'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('backend.productcategory.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'category_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'description' => 'nullable|string',
        ]);

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('category_images', 'public');
        } else {
            $imagePath = null;
        }

        // Create the category
        ProductCategory::create([
            'category_name' => $request->category_name,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        // Redirect to the index page
        return redirect()->route('product_categories.index')->with('success', 'Category created successfully');
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $category = ProductCategory::findOrFail($id);
        return view('backend.productcategory.edit', compact('category'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'category_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'description' => 'nullable|string',
        ]);

        // Find the category to update
        $category = ProductCategory::findOrFail($id);

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($category->image && file_exists(storage_path('app/public/' . $category->image))) {
                unlink(storage_path('app/public/' . $category->image));
            }

            // Store the new image
            $imagePath = $request->file('image')->store('category_images', 'public');
        } else {
            $imagePath = $category->image; // Keep the old image if no new image is uploaded
        }

        // Update the category
        $category->update([
            'category_name' => $request->category_name,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        // Redirect to the index page
        return redirect()->route('product_categories.index')->with('success', 'Category updated successfully');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);

        // Delete the category image if it exists
        if ($category->image && file_exists(storage_path('app/public/' . $category->image))) {
            unlink(storage_path('app/public/' . $category->image));
        }

        // Delete the category
        $category->delete();

        // Redirect to the index page
        return redirect()->route('product_categories.index')->with('success', 'Category deleted successfully');
    }
}
