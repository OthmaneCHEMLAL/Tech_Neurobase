@extends('backend.layout.app')

@section('content')
    <main>
        <!-- Page Header -->
        <div class="head-title">
            <div class="left">
                <h1>Create New Product</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('dashboard.show') }}">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a href="{{ route('products.index') }}">Products</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="{{ route('products.create') }}">Create</a>
                    </li>
                </ul>
            </div>
            <a href="{{ route('products.index') }}" class="btn-download">
                <i class='bx bx-arrow-back bx-fade-left-hover'></i>
                <span class="text">Back to Product List</span>
            </a>
        </div>

        <!-- Product Creation Form -->
        <div class="form-container">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" class="form-control" id="product_name" value="{{ old('product_name') }}" required>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" id="price" value="{{ old('price') }}" required step="0.01">
                </div>

                <div class="form-group">
                    <label for="product_description">Product Description</label>
                    <textarea name="product_description" class="form-control" id="product_description" rows="4" required>{{ old('product_description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control" id="category_id" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="images">Product Images</label>
                    <input type="file" name="images[]" class="form-control" id="images" multiple>
                </div>

                <button type="submit" class="btn btn-primary">Create Product</button>
            </form>
        </div>
    </main>
@endsection
