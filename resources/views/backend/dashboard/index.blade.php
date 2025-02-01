@extends('backend.layout.app')

@section('content')

    <main>
			<div class="head-title">
				<div class="left">					
					<h1>Welcome to your Dashboard, {{ Auth::user()->name }}!</h1>
				</div>
			</div>
		</main>

@endsection
