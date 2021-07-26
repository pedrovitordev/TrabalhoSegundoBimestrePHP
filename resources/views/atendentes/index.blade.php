 {{-- Falando para a pagina que vai usar ela --}}
 @extends('layouts.app')


 {{-- Esse bloco todo vai ser utilizado na app.blade --}}
 @section('content')

     <div class="row">
         <div class="col-sm-12">
             <a href="{{ route('atendentes.create') }}" class="btn btn-sucess float-right">Criar atendentes</a>
             <h2>Atendentes</h2>
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

                 @forelse ($atendentes as $atendente)
                     <tr>
                         <td>{{ $atendente->id }}</td>
                         <td>{{ $atendente->nome }}</td>
                         <td>{{ $atendente->cpf }}</td>
                         <td>{{ $atendente->telefone }}</td>
                         <td>{{ $atendente->nascimento }}</td>
                         <td>{{ date('d/m/Y H:i:s', strtotime($atendente->created_at)) }}</td>
                         <td>

                             <div class="btn-group">

                                 <a href="{{ route('atendentes.show', ['atendente' => $atendente->id]) }}"
                                     class="btn btn-sm btn-primary">Editar</a>

                                 <form action="{{ route('atendentes.destroy', ['atendente' => $atendente->id]) }}"
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
         {{ $atendentes->links() }}
     </div>
 @endsection
