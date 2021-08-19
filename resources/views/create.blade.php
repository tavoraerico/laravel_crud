@extends('templates.template')
@section('content')
<body>
	@if(isset($livro))
	<form action="{{ url("livros/$livro->id")}}" method="POST">
		@method('PUT')
		@csrf		
		<input type="text" name="nome" placeholder="Nome" value="{{$livro->nome}}" required> <br />	

		<input type="text" name="autor" placeholder="Autor" value="{{$livro->autor}}" required> <br />
		<input type="text" name="editora" placeholder="Editora" value="{{$livro->editora}}" required> <br />
		<input type="text" name="preco" placeholder="Preço" value="{{$livro->preco}}" required> <br />
		<button >Editar</button>
	</form>
	@else
	<form action="{{ route('create')}}" method="POST">
		@csrf		
		<input type="text" name="nome" placeholder="Nome" required> <br />		
		<input type="text" name="autor" placeholder="Autor" required> <br />
		<input type="text" name="editora" placeholder="Editora" required> <br />
		<input type="text" name="preco" placeholder="Preço" required> <br />
		<button>Adicionar</button>
	</form>
	@endif
</body>
@endsection