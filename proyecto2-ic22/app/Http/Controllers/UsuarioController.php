<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
Use Session;
Use Redirect;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('user/login');
    }

    /**
     * Validate data login
     */
    public function validateLogin(Request $request){
        //
        $datosLogin = request()->except('_token','btnSave');
        $email = $datosLogin['email'];
        $password = $datosLogin['password'];
        $redirect = '';

        $result = Usuario::all();

        foreach($result as $client){
            if($client['email'] == $email && $client['password'] == $password){
                $role = $clients['roleId'];
                $mensaje = 'Encontro';

                $user =
                [
                    "id" => $client['id'],
                    "firstName" => $client['firstName'],
                    "lastName" => $client['lastName'],
                    "email" => $client['lastName'],
                    "roleId" => $client['roleId'],

                ];
                
                //Almacena mensaje
                Session::flash('message','Bienvenido');

                //Guarda la redireccion
                $redirect = Redirect::to('/admin');

                //Rompe el ciclo
                break;
                
            }
            else {
                $mensaje = 'No encontro';
                Session::flash('message','Error, no se encontraron datos');
                $redirect = Redirect::to('/user');
            }
        }   

       return $redirect;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['pageTitle'] = "Registro - Usuario ";
        return view('user/register',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosUsuario = request()->except('_token','btnSave');
        Usuario::insert($datosUsuario);
        
        return redirect('user/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
