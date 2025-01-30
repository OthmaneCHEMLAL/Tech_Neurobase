@extends('layouts.app')

@section('content')
<div class="container">
    <div class="register-box">
        <h2>Inscription</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-group">
                <input type="text" name="name" placeholder="Nom" value="{{ old('name') }}" required>
            </div>
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Mot de passe" required>
            </div>
            <div class="input-group">
                <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
            </div>
            <div class="register-buttons">
                <button type="submit">S'inscrire</button>
                <a href="{{ route('login') }}" class="login-button">Se connecter</a>
            </div>
        </form>
    </div>
</div>
@endsection
