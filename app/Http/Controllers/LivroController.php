<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\User;

class LivroController extends Controller
{
    private $objUser;
    private $objLivro;

    public function __construct(){
       // $this->objUser=new User();
        $this->objLivro=new Livro();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
        $livro = $this->objLivro->all();
        return view("index", compact('livro'));
        } else{
            return view('auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view("create");
        } else{
            return view('auth.login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            Livro::create([
                'nome' => $request->nome,
                'autor' => $request->autor,
                'editora' => $request->editora,
                'preco' => $request->preco,
            ]);
            return redirect()->route('index')->with('success', 'Livro Adicionado!');
        } else{
            return view('auth.login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {       
        if (Auth::check()) {
            $livro=$this->objLivro->find($id);
            return view('show', compact('livro'));

        } else{
            return view('auth.login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $livro= $this->objLivro->find($id);
            return view('create', compact('livro'));
        } else{
            return view('auth.login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            $this->objLivro->where(['id'=>$id])->update([
                'nome'=>$request->nome,
                'autor'=>$request->autor,
                'editora'=>$request->editora,
                'preco'=>$request->preco
            ]);
            return redirect()->route('index');
        } else{
            return view('auth.login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            Livro::findOrFail($id)->delete();
            return redirect()->route('index');
        } else{
            return view('auth.login');
        }
    }
}
