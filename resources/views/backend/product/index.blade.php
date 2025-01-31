@extends('backend.layout.app')

@section('content')

    <div class="container">
        <!-- Title section -->
        <div class="header">
            <h1 class="title">Product List</h1>
        </div>

        <!-- Create New Product button -->
        <div class="create-product mb-3">
            <a href="{{ route('products.create') }}" class="btn btn-success">Create New Product</a>
        </div>

        <!-- Product Table -->
        <div class="table-container">
            <table class="table table-bordered product-table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->category->category_name }}</td>
                            <td>{{ $product->status == 1 ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <!-- Edit Icon -->
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Delete Icon -->
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
