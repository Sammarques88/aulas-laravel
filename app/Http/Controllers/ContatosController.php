<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Contatos;
//importando o arquivo de validação
use App\Http\Requests\FormRequestContatos;
 
class ContatosController extends Controller
{
     public function index()
    {
        $findContatos = Contatos::get();
        return view('pages.contatos.index', compact('findContatos'));
    }
 
    public function delete($IdUser)
    {
       $buscaRegistro = Contatos::find($IdUser);
       $buscaRegistro->delete();
       return back();
    }
 
    public function create(FormRequestContatos $request)
    {
 
        //condicional para entendimento do envio dos dados para o banco de dados
        if ($request->method() == "POST"){
            $data = $request->all();
            Contatos::create($data);

            return redirect('/contatos');
        }
        return view('pages.contatos.create');
    }
}