{{-- Falando para a pagina que vai usar ela --}}
@extends('layouts.app')


{{-- Esse bloco todo vai ser utilizado na app.blade --}}
@section('content')

    <form action="{{ route('medicos.update', ['medico' => $medico->id]) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $medico->nome }}">
        </div>
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" class="form-control" value="{{ $medico->cpf }}">
        </div>

        <div class="form-group">
            <label for="nascimento">Telefone:</label>
            <input type="text" name="telefone" id="telefone" class="form-control" value="{{ $medico->telefone }}">
        </div>

        <div class="form-group">
            <label for="nascimento">Nascimento:</label>
            <input type="text" name="nascimento" id="nascimento" class="form-control" value="{{ $medico->nascimento }}">
        </div>

        <div class="form-group">
            <label for="crm">CRM:</label>
            <input type="text" name="crm" id="crm" class="form-control" value="{{ $medico->crm }}">
        </div>

        <div class="form-group">
            <label for="nascimento">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control" value="{{ $medico->senha }}">
        </div>

        <button class="btn btn-lg btn-sucess">Atualizar Medico/a</button>
    </form>
@endsection
