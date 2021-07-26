{{-- Falando para a pagina que vai usar ela --}}
@extends('layouts.app')


{{-- Esse bloco todo vai ser utilizado na app.blade --}}
@section('content')

    <form action="{{route('pacientes.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{old('nome')}}">
        </div>
        <div class="form-group">
            <label for="description">CPF:</label>
            <input type="text" name="cpf" id="cpf" class="form-control" value="{{old('cpf')}}">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" class="form-control" value="{{old('telefone')}}">
        </div>
        <div class="form-group">
            <label for="nascimento">Nascimento:</label>
            <input type="date" name="nascimento" id="nascimento" class="form-control" value="{{old('nascimento')}}">
        </div>
        <button class="btn btn-lg btn-sucess">Criar Paciente</button>
    </form>
@endsection

