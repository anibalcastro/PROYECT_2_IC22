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
                    "roleId" => $client['roleId'],

                ];
                
                //Creamos session y almacena session
                session_start();
                $_SESSION['user'] = $user;

                //Almacena mensaje
                Session::flash('message',"Bienvenido ".$user['firstName'] );

                if ($user['roleId'] == 1){
                    //Guarda la redireccion administrador
                    $redirect = Redirect::to('/admin');
                }
                else {
                    //Redirecciona al dashboard
                }

                //Guarda la redireccion
                $redirect = Redirect::to('/admin');

                //Rompe el ciclo
                break;
                
            }
            else {
                $mensaje = 'No encontro';
                Session::flash('message','Error, no se encontraron datos');
                $redirect = Redirect::to('/login');
            }
        }   

       return $redirect;
    }
    
    public function register(){
         //
         $data['pageTitle'] = "Registro / N-Noticias ";
         return view('user/register',$data);
    }

    public function registerAction(){
        $datosUsuario = request()->except('_token','btnSave');
        User::insert($datosUsuario);
        
        return redirect('user/');
    }

}
