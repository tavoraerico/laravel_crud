<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivrosController extends Controller
{

	public function index(){
    	/*$livros = Livro::latest()->paginate(5);
        return view('index',compact('livros'))->with('i', (request()->input('page', 1) - 1) * 5);*/
        return view('index');
        //return view('create');
    }

    public function create() {
    	return view('create');
    }

    public function store(Request $request){
    	//dd($request->all());
    	Livro::create([
    		'nome' => $request->nome,
    		'autor' => $request->autor,
    		'editora' => $request->editora,
    		'preco' => $request->preco,
    	]);
    	return $this->index()->with('success','Livro adicionado com sucesso!');
    }

    public function edit(Product $product){
    	return view('edit',compact('livro'));
    }

    public function read(){

    	return view('read');
    }

    public function update(Request $request, Product $livro){
        $request->validate([
        	'nome' => 'required',
            'autor' => 'required',
            'editora' => 'required',
            'preco' => 'required',
        ]);

        $livro->update($request->all());
        return redirect()->route('index')->with('success','Livro atualizado!');
    }

        public function destroy(Product $product){
        $livro->delete();
        return redirect()->route('index')->with('success','Livro deletado!');
    }
}
