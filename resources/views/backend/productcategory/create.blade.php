@extends('backend.layout.app')

@section('content')
    <div class="container">
        <h1>Create New Category</h1>

        <form action="{{ route('product_categories.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf

            <!-- Category Name and Image -->
            <div class="form-group input-row">
                <div class="input-half">
                    <label for="category_name">Category Name</label>
                    <input type="text" name="category_name" id="category_name" class="form-control" required>
                </div>

                <div class="input-half">
                    <label for="image">Category Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
            </div>

            <!-- Description Field -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>
@endsection
