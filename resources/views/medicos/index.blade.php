 {{-- Falando para a pagina que vai usar ela --}}
 @extends('layouts.app')


 {{-- Esse bloco todo vai ser utilizado na app.blade --}}
 @section('content')

     <div class="row">
         <div class="col-sm-12">
             <a href="{{ route('medicos.create') }}" class="btn btn-sucess float-right">Criar Medicos</a>
             <h2>Medicos</h2>
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
                     <th>CRM</th>
                     <th>Especialidade</th>
                     <th>Criado em</th>
                     <th>Ações</th>
                 </tr>
             </thead>
             <tbody>

                 @forelse ($medicos as $medico)
                     <tr>
                         <td>{{ $medico->id }}</td>
                         <td>{{ $medico->nome }}</td>
                         <td>{{ $medico->cpf }}</td>
                         <td>{{ $medico->telefone }}</td>
                         <td>{{ $medico->nascimento }}</td>
                         <td>{{ $medico->crm }}</td>
                         <td>{{ $medico->especialidade }}</td>
                         <td>{{ date('d/m/Y H:i:s', strtotime($medico->created_at)) }}</td>
                         <td>

                             <div class="btn-group">

                                 <a href="{{ route('medicos.show', ['medico' => $medico->id]) }}"
                                     class="btn btn-sm btn-primary">Editar</a>

                                 <form action="{{ route('medicos.destroy', ['medico' => $medico->id]) }}"
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
                         <td colspan="4">Nenhum atendente cadastrada</td>
                     </tr>
                 @endforelse
             </tbody>

         </table>
         {{ $medicos->links() }}
     </div>
 @endsection
