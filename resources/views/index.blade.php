@extends('templates.template')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('create') }}"> Criar novo Produto</a>
            </div>
        </div>
    </div>
    @csrf
     <table class="table table-dark table-striped">
        <tr>
            
            <th>Nome</th>
            <th>Autor</th>
            <th>Editora</th>
            <th>Preco</th>

            <th width="250px">Action</th>

        </tr>

        @foreach ($livro as $livros)

        <tr>


            <td>{{ $livros->nome }}</td>

            <td>{{ $livros->autor }}</td>

            <td>{{ $livros->editora }}</td>

            <td>{{ $livros->preco }}</td>

            <td>

                <form action="{{ route('destroy',$livros->id) }}" method="POST">
                    @csrf
                    
   
                    <a class="btn btn-info" href="{{ route('show',$livros->id) }}">Ver</a>

                    <a class="btn btn-primary" href="{{ route('edit',$livros->id) }}">Editar</a>
    
                    <a href="{{url("livros/$livros->id")}}" class="js-del">
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" >Apagar</button>
                    </a>
                </form>

            </td>

        </tr>

        @endforeach

    </table>

@endsection
   

   

   
  


      

