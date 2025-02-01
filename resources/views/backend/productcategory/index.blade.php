@extends('backend.layout.app')

@section('content')
    <main>
        <!-- Page Header -->
        <div class="head-title">
            <div class="left">
                <h1>Product Categories</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('dashboard.show') }}">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="{{ route('product_categories.index') }}">Categories</a>
                    </li>
                </ul>
            </div>
            <a href="{{ route('product_categories.create') }}" class="btn-download">
                <i class='bx bx-plus bx-fade-down-hover'></i>
                <span class="text">Add New Category</span>
            </a>
        </div>

        <!-- Category Table -->
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>All Categories</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Category Name</th>
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
                                    <a href="{{ route('product_categories.edit', $category->id) }}" class="btn btn-primary">
                                        <i class='bx bx-edit'></i>
                                    </a>
                                    <form action="{{ route('product_categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">
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
