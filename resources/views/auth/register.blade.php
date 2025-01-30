@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Inscription</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="name" placeholder="Nom" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
        <button type="submit">S'inscrire</button>
    </form>
</div>
@endsection
