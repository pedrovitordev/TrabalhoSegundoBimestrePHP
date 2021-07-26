{{-- Falando para a pagina que vai usar ela --}}
@extends('layouts.app')


{{-- Esse bloco todo vai ser utilizado na app.blade --}}
@section('content')

    <form action="{{ route('atendentes.update', ['atendente' => $atendente->id]) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $atendente->nome }}">
        </div>
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" class="form-control" value="{{ $atendente->cpf }}">
        </div>

        <div class="form-group">
            <label for="nascimento">Telefone:</label>
            <input type="text" name="telefone" id="telefone" class="form-control" value="{{ $atendente->telefone }}">
        </div>

        <div class="form-group">
            <label for="nascimento">Nascimento:</label>
            <input type="text" name="nascimento" id="nascimento" class="form-control" value="{{ $atendente->nascimento }}">
        </div>

        <div class="form-group">
            <label for="nascimento">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control" value="{{ $atendente->senha }}">
        </div>


        <button class="btn btn-lg btn-sucess">Atualizar Atendente</button>
    </form>
@endsection
