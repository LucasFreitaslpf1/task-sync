<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioPostRequest;
use App\Http\Requests\UsuarioPostUpdateRequest;
use App\Models\Usuario\Usuario;
use Exception;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function index()
    {
        $users = Usuario::paginate(10);

        return view('usuario.index', ['users' => $users]);
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function salvar(UsuarioPostRequest $request)
    {
        $campos = $request->validated();
        Usuario::create($campos);

        return redirect()->route('/usuario');
    }

    public function view(int $id)
    {

        $usuario = $this->findUsuario($id);

        return view('usuario.view', ['usuario' => $usuario]);
    }

    public function update(Usuario $usuario)
    {
        // $usuario = $this->findUsuario($id);


        return view('usuario.update', ['usuario' => $usuario]);
    }

    public function atualizar(UsuarioPostUpdateRequest $request, Usuario $usuario)
    {
        $usuario->update($request->validated());

        return view('usuario.view', ['usuario' => $usuario]);
    }


    private function findUsuario(int $id)
    {
        try {
            $usuario = Usuario::find($id);
            if ($usuario) {
                return $usuario;
            }
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }
}
