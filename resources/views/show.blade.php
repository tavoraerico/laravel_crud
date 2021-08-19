@extends('templates.template')
@section('content')

    

  <h1 class="text-center">Visualizar</h1> <hr>

<div class="col-8 m-auto">
    ID: {{$livro->id}}<br>
    Título: {{$livro->nome}}<br>
    Autor: {{$livro->autor}}<br>
    Editora: {{$livro->editora}}<br>
    Preço: {{$livro->preco}}
</div>

@endsection


   

   

   
  


      

