@extends('backend.layout.app')

@section('content')
    <div class="container">
        <h1>Create New Product</h1>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf

            <div class="form-group input-row">
                <div class="input-half">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" class="form-control" id="product_name" value="{{ old('product_name') }}" required>
                </div>

                <div class="input-half">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" id="price" value="{{ old('price') }}" required step="0.01">
                </div>
            </div>

            <div class="form-group">
                <label for="product_description">Product Description</label>
                <textarea name="product_description" class="form-control" id="product_description" rows="4" required>{{ old('product_description') }}</textarea>
            </div>

            <div class="form-group input-row">
                <div class="input-half">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="input-half">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control" id="category_id" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="images">Product Images</label>
                <input type="file" name="images[]" class="form-control" id="images" multiple>
            </div>

            <button type="submit" class="btn btn-primary">Create Product</button>
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
