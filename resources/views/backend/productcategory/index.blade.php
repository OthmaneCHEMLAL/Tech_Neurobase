@extends('backend.layout.app')

@section('content')
    <div class="container">
        <!-- Title section -->
        <div class="header">
            <h1 class="title">Product Categories</h1>
        </div>

        <!-- Create New Category button -->
        <div class="create-category mb-3">
            <a href="{{ route('product_categories.create') }}" class="btn btn-success">Create New Category</a>
        </div>

        <!-- Category Table -->
        <div class="table-container">
            <table class="table table-bordered product-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <!-- Edit Icon -->
                                <a href="{{ route('product_categories.edit', $category->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <!-- Delete Icon -->
                                <form action="{{ route('product_categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">
                                        <i class="fas fa-trash-alt"></i> Delete
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
