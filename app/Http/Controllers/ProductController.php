<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([
            'showproducts', 'storeproduct', 'updateproduct', 'destroyproduct' // API functions should be public
        ]);
    }
    

    // Show the list of products (index)
    public function index()
    {
        $products = Product::with('category')->get(); // Get products with their associated categories
        return view('backend.product.index', compact('products'));
    }

    // Show the form for creating a new product
    public function create()
    {
        $categories = ProductCategory::all(); // Get all product categories
        return view('backend.product.create', compact('categories'));
    }

    // Store a newly created product in the database
    public function store(Request $request)
{
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'status' => 'required|boolean',
            'price' => 'required|numeric|min:0', // Make sure price is a numeric value
            'category_id' => 'required|exists:product_categories,id',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
    // Clean the price input to ensure it's a valid number
    $price = filter_var($request->input('price'), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    $images = [];
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $images[] = $image->store('products');
        }
    }

    Product::create([
        'product_name' => $request->input('product_name'),
        'product_description' => $request->input('product_description'),
        'status' => $request->input('status'),
         'price' => (float) $request->input('price'),
        'category_id' => $request->input('category_id'),
        'images' => $images,
    ]);

    return redirect()->route('products.index')->with('success', 'Product created successfully!');
}

    
    // Show the form for editing the specified product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all(); // Get all product categories
        return view('backend.product.edit', compact('product', 'categories'));
    }

    // Update the specified product in the database
 public function update(Request $request, $id)
{
    $request->validate([
        'product_name' => 'required|string|max:255',
        'product_description' => 'required|string',
        'status' => 'required|boolean',
        'price' => 'required|numeric|min:0', // Add validation for price
        'category_id' => 'required|exists:product_categories,id',
        'images' => 'nullable|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $product = Product::findOrFail($id);

    $images = $product->images;
    if ($request->hasFile('images')) {
        foreach ($images as $image) {
            Storage::delete($image);
        }

        $images = [];
        foreach ($request->file('images') as $image) {
            $images[] = $image->store('products');
        }
    }

    // For update:
        $product->update([
            'product_name' => $request->input('product_name'),
            'product_description' => $request->input('product_description'),
            'status' => $request->input('status'),
            'price' => (float) $request->input('price'),
            'category_id' => $request->input('category_id'),
            'images' => $images,
        ]);

    return redirect()->route('products.index')->with('success', 'Product updated successfully!');
}


    // Remove the specified product from the database
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete product images from storage
        foreach ($product->images as $image) {
            Storage::delete($image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }




    ////////////////////////for api recat 

     // Show the list of products (index)
     public function showproducts()
     {
         // Fetch all products and include their associated categories
         $products = Product::with('category')->get();
         return response()->json($products); // Return as JSON response for API consumption
     }
 
     // Store a newly created product in the database
     public function storeproduct(Request $request)
     {
         // Validate the incoming request
         $request->validate([
             'product_name' => 'required|string|max:255',
             'product_description' => 'required|string',
             'status' => 'required|boolean',
             'price' => 'required|numeric|min:0',
             'category_id' => 'required|exists:product_categories,id',
             'images' => 'nullable|array',
             'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
 
         // Clean the price input to ensure it's a valid number
         $price = filter_var($request->input('price'), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
 
         // Initialize an empty array for images
         $images = [];
         if ($request->hasFile('images')) {
             foreach ($request->file('images') as $image) {
                 $images[] = $image->store('products'); // Store images in 'products' directory
             }
         }
 
         // Create the product in the database
         $product = Product::create([
             'product_name' => $request->input('product_name'),
             'product_description' => $request->input('product_description'),
             'status' => $request->input('status'),
             'price' => (float) $request->input('price'),
             'category_id' => $request->input('category_id'),
             'images' => $images,
         ]);
 
         return response()->json($product, 201); // Return the newly created product as a JSON response
     }
 
     // Update the specified product in the database (but without overwriting data)
     public function updateproduct(Request $request, $id)
     {
         $product = Product::findOrFail($id); // Find the product by its ID
 
         // If no update data was passed, keep the old values
         $product->update([
             'product_name' => $request->input('product_name', $product->product_name),
             'product_description' => $request->input('product_description', $product->product_description),
             'status' => $request->input('status', $product->status),
             'price' => (float) $request->input('price', $product->price),
             'category_id' => $request->input('category_id', $product->category_id),
         ]);
 
         // Only update images if new images are provided
         $images = $product->images;
         if ($request->hasFile('images')) {
             // Delete old images from storage
             foreach ($images as $image) {
                 Storage::delete($image);
             }
 
             // Store new images
             $images = [];
             foreach ($request->file('images') as $image) {
                 $images[] = $image->store('products');
             }
 
             // Update the images in the product
             $product->images = $images;
             $product->save();
         }
 
         return response()->json($product); // Return the updated product as a JSON response
     }
 
     // Remove the specified product from the database
     public function destroyproduct($id)
     {
         $product = Product::findOrFail($id); // Find the product by its ID
 
         // Delete associated images from storage
         foreach ($product->images as $image) {
             Storage::delete($image);
         }
 
         // Delete the product from the database
         $product->delete();
 
         return response()->json(['message' => 'Product deleted successfully']); // Return a success message
     }
}
