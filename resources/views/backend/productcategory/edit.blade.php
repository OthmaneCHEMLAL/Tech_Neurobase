@extends('backend.layout.app')

@section('content')
    <div class="container">
        <h1>Edit Category</h1>

        <form action="{{ route('product_categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf
            @method('PUT')

            <!-- Category Name and Image -->
            <div class="form-group input-row">
                <div class="input-half">
                    <label for="category_name">Category Name</label>
                    <input type="text" name="category_name" id="category_name" class="form-control" value="{{ $category->category_name }}" required>
                </div>

                <div class="input-half">
                    <label for="image">Category Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <!-- Display Current Image -->
                    <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" style="width: 100px; margin-top: 10px;">
                </div>
            </div>

            <!-- Description Field -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
@endsection
