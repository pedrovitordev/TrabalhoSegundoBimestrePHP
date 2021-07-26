{{-- Falando para a pagina que vai usar ela --}}
@extends('layouts.app')


{{-- Esse bloco todo vai ser utilizado na app.blade --}}
@section('content')

    <form action="{{ route('pacientes.update', ['paciente' => $paciente->id]) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $paciente->nome }}">
        </div>
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" class="form-control" value="{{ $paciente->cpf }}">
        </div>

        <div class="form-group">
            <label for="nascimento">Telefone:</label>
            <input type="text" name="telefone" id="telefone" class="form-control" value="{{ $paciente->telefone }}">
        </div>

        <div class="form-group">
            <label for="nascimento">Nascimento:</label>
            <input type="text" name="nascimento" id="nascimento" class="form-control" value="{{ $paciente->nascimento }}">
        </div>

        <button class="btn btn-lg btn-sucess">Atualizar Paciente</button>
    </form>
@endsection
