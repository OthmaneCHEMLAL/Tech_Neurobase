@extends('backend.layout.app')

@section('content')
    <div class="container">
        <h1>Welcome to your Dashboard, {{ Auth::user()->name }}!</h1>
        <p>This is your personal dashboard where you can view and manage your data.</p>
    </div>
@endsection
