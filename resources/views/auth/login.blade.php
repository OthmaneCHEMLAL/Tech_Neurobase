@extends('layouts.app')

@section('content')
<div class="container">
    <div class="login-box">
        <h2>Connexion</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Mot de passe" required>
            </div>
            <div class="login-buttons">
                <button type="submit">Se connecter</button>
                <a href="{{ route('register') }}" class="register-button">S'inscrire</a>
            </div>
        </form>
    </div>
</div>
@endsection
