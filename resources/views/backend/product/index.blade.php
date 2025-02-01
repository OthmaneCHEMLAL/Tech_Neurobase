@extends('backend.layout.app')

@section('content')
    <main>
        <!-- Page Header -->
        <div class="head-title">
            <div class="left">
                <h1>Product List</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('dashboard.show') }}">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="{{ route('products.index') }}">Products</a>
                    </li>
                </ul>
            </div>
            <a href="{{ route('products.create') }}" class="btn-download">
                <i class='bx bx-plus bx-fade-down-hover'></i>
                <span class="text">Add New Product</span>
            </a>
        </div>

        <!-- Product Table -->
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>All Products</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <table>
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
                                <td>
                                    <span class="status {{ $product->status == 1 ? 'completed' : 'pending' }}">
                                        {{ $product->status == 1 ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">
                                        <i class='bx bx-edit'></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                                            <i class='bx bx-trash'></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
