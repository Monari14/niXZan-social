@extends('layouts.app')

@section('content')
    <center>
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="text" name="emailUser" id="emailUser" placeholder="Nome de usuário ou E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
            <button type="reset">Reset</button>
        </form>
    </center>
@endsection
