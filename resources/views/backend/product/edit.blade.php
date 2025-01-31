@extends('backend.layout.app')

@section('content')
    <div class="container">
        <h1>Edit Product: {{ $product->product_name }}</h1>

        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf
            @method('PUT')

            <!-- Product Name and Price -->
            <div class="form-group input-row">
                <div class="input-half">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" class="form-control" id="product_name" value="{{ old('product_name', $product->product_name) }}" required>
                </div>

                <div class="input-half">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" id="price" value="{{ old('price', $product->price) }}" required step="0.01">
                </div>
            </div>

            <!-- Product Description -->
            <div class="form-group">
                <label for="product_description">Product Description</label>
                <textarea name="product_description" class="form-control" id="product_description" rows="4" required>{{ old('product_description', $product->product_description) }}</textarea>
            </div>

            <!-- Status and Category -->
            <div class="form-group input-row">
                <div class="input-half">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="input-half">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control" id="category_id" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Product Images -->
            <div class="form-group">
                <label for="images">Product Images</label>
                <input type="file" name="images[]" class="form-control" id="images" multiple>
                <small class="form-text text-muted">Leave empty if you don't want to change the images.</small>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection

<script>
    document.getElementById('price').addEventListener('input', function (e) {
        let value = e.target.value;
        
        // Remove all non-numeric characters, except for a dot (.)
        value = value.replace(/[^0-9.]/g, '');
        
        // Allow only one decimal point
        let parts = value.split('.');
        if (parts.length > 2) {
            value = parts[0] + '.' + parts[1].slice(0, 2); // Limit decimal places to 2
        }
        
        e.target.value = value;
    });
</script>
