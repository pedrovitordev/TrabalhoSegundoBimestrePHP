 {{-- Falando para a pagina que vai usar ela --}}
 @extends('layouts.app')


 {{-- Esse bloco todo vai ser utilizado na app.blade --}}
 @section('content')

     <div class="row">
         <div class="col-sm-12">
             <a href="{{ route('pacientes.create') }}" class="btn btn-sucess float-right">Criar categoria</a>
             <h2>Pacientes</h2>
             <div class="clearfix"></div>
         </div>
     </div>
     <div class="row">
         <table class="table table-striped">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>Nome</th>
                     <th>CPF</th>
                     <th>Telefone</th>
                     <th>Nascimento</th>
                     <th>Criado em</th>
                     <th>Ações</th>
                 </tr>
             </thead>
             <tbody>

                 @forelse ($pacientes as $paciente)
                     <tr>
                         <td>{{ $paciente->id }}</td>
                         <td>{{ $paciente->nome }}</td>
                         <td>{{ $paciente->cpf }}</td>
                         <td>{{ $paciente->telefone }}</td>
                         <td>{{ $paciente->nascimento }}</td>
                         <td>{{ date('d/m/Y H:i:s', strtotime($paciente->created_at)) }}</td>
                         <td>

                             <div class="btn-group">

                                 <a href="{{ route('pacientes.show', ['paciente' => $paciente->id]) }}"
                                     class="btn btn-sm btn-primary">Editar</a>

                                 <form action="{{ route('pacientes.destroy', ['paciente' => $paciente->id]) }}"
                                     method="post">
                                     @csrf
                                     @method('DELETE')
                                     <input type="submit" value="Remover" class="btn btn-sm btn-danger ">
                                 </form>
                                 
                             </div>
                         </td>
                     </tr>
                 @empty
                     <tr>
                         <td colspan="4">Nenhum paciente cadastrada</td>
                     </tr>
                 @endforelse
             </tbody>

         </table>
         {{$pacientes->links()}}
     </div>
 @endsection

