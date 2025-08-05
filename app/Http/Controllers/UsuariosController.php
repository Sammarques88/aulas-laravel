<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\requests\FormRequestUsuarios;

//Hash de autentificação - necessário para criptografia de senha
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
       public function __construct(User $user) {
        $this->user = $user;
    }

     public function index(Request $request){
        $pesquisar = $request->pesquisar;
        $findUser = $this->user->getFiltrosPaginate(search: $pesquisar ?? "");
     
    
        return view('pages.usuarios.index', compact('findUser'));
    }

     public function delete($IdUser)
    {
       $buscaRegistro = User::find($IdUser);
       $buscaRegistro->delete();
       
       return back();
    }

    public function create(FormRequestUsuarios $request)
    {
 
        //condicional para entendimento do envio dos dados para o banco de dados
        if ($request->method() == "POST"){
            $data = $request->all();
            User::create(
                [
                    "permissao_do_usuario" => $data['permissao_do_usuario'],
                    "name" => $data['name'],
                    "email" => $data['email'],
                    "password" => Hash::make($data['password']),

                ]
            );

            return redirect('/usuarios');
        }
        return view('pages.usuarios.create');
    }
 
}


