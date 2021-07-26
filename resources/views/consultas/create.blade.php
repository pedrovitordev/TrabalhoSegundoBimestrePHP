{{-- Falando para a pagina que vai usar ela --}}
@extends('layouts.app')


{{-- Esse bloco todo vai ser utilizado na app.blade --}}
@section('content')

    <form action="{{ route('consultas.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="data">Nome paciente:</label>
            <select class="bloco">
                @forelse ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
                @empty
                    <tr>
                        <td colspan="4">Nenhum paciente cadastrada</td>
                    </tr>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="data">Nome medico:</label>
            <select class="bloco">
                @forelse ($medicos as $medico)
                    <option value="{{ $medico->id }}">{{ $medico->nome }}</option>
                @empty
                    <tr>
                        <td colspan="4">Nenhum paciente cadastrada</td>
                    </tr>
                @endforelse
            </select>
        </div>

        <div class="form-group">
            <label for="data">Data:</label>
            <input type="date" name="data" id="data" class="form-control" value="{{ old('data') }}">
        </div>

        <div class="form-group">
            <label for="hora">Hora:</label>
            <input type="time" name="hora" id="hora" class="form-control" value="{{ old('hora') }}">
        </div>

        <div class="form-group">
            <label for="motivo">Motivo:</label>
            <input type="text" name="motivo" id="motivo" class="form-control" value="{{ old('motivo') }}">
        </div>
        <div class="form-group">
            <label for="historico">Historico:</label>
            <input type="text" name="historico" id="historico" class="form-control" value="{{ old('historico') }}">
        </div>

        <button class="btn btn-lg btn-sucess">Criar Consulta</button>
    </form>
@endsection
