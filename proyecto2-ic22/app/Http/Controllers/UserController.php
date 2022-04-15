<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
Use Session;
Use Redirect;

class UserController extends Controller
{

    public function index(){
        //
        $data['pageTitle'] = "Login / N-Noticias ";
        $data['head'] = view('sharedUser.head',$data);
        return view('user/login',$data);
    }

    public function validateLogin(){
        //
        $datosLogin = request()->except('_token','btnSave');
        $email = $datosLogin['email'];
        $password = $datosLogin['password'];
        $redirect = '';

        $result = User::all();

        foreach($result as $client){
            if($client['email'] == $email && $client['password'] == $password){
                $role = $client['roleId'];
                $mensaje = 'Encontro';

                $user =
                [
                    "id" => $client['id'],
                    "firstName" => $client['firstName'],
                    "lastName" => $client['lastName'],
                    "email" => $client['lastName'],
                    "roleId" => $client['roleId']

                ];
                
                //Creamos session y almacena session
                session($usuario = ['email'=> $client,
                "firstName" => $client['firstName'],
                "roleId"=> $client['roleId'],
                "session_start" => true]);


                //Almacena mensaje
                Session::flash('message',"Bienvenido ".$user['firstName'] );

                if ($user['roleId'] == 1){
                    //Guarda la redireccion administrador
                    $redirect = Redirect::to('/admin');
                }
                else {
                    //Redirecciona al dashboard - noticias
                }

                //Rompe el ciclo
                break;
                
            }
            else {
                Session::flash('message','Error, datos son incorrectos');
                $redirect = Redirect::to('/login');
            }
        }   

       return $redirect;
    }
    
    public function register(){
         //
         $data['pageTitle'] = "Registro / N-Noticias ";
         $data['head'] = view('sharedUser.head',$data);
         return view('user/register',$data);
    }

    public function registerAction(){
        try {
            $datosUsuario = request()->except('_token','btnSave');
            User::insert($datosUsuario);
            
            return redirect('/');
        } catch (\Throwable $th) {
            Session::flash('message',"Error, usuario ya exitente" );
            return redirect('/register');
        }
    }

}
