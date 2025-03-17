@extends('layouts.app')

@section('content1')
    <center>
        <h1>Cadastro</h1>
        <form action="{{ route('cadastro') }}" method="POST">
            @csrf
            <input type="text" name="username" id="username" placeholder="Nome de usuário" required>
            <input type="text" name="email" id="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
            <button type="reset">Reset</button>
        </form>
    </center>
@endsection
