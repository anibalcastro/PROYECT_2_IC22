<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\RegistroMailable;
use Illuminate\Support\Facades\Mail;
use Barryvdh\Debugbar\Facade as Debugbar;

Use Session;
Use Redirect;

class UserController extends Controller
{

    public function index(){
        //
        $data['pageTitle'] = "Login / N-Noticias ";
        $data['css'] = asset('css/user.css');
        $data['head'] = view('shared.head',$data);
        return view('user/login',$data);
    }

    /**
     * Valida login
     */
    public function validateLogin(){
        //
        $datosLogin = request()->except('_token','btnSave');
        $email = $datosLogin['email'];
        $password = $datosLogin['password'];

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
                session($usuario = ['email'=> $client['email'],
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
                    $redirect = Redirect::to('/source');
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
    
    /**
     * View register
     */
    public function register(){
         //
         $data['pageTitle'] = "Registro / N-Noticias ";
         $data['css'] = asset('css/user.css');
         $data['head'] = view('shared.head',$data);
         return view('user/register',$data);
    }

    public function registerAction(){
        try {
            $datosUsuario = request()->except('_token','btnSave');
            $resultDb = User::insert($datosUsuario);
            
            if ($resultDb){
                $mail = new RegistroMailable();
                Mail::to($datosUsuario['email'])->send($mail);
                Session::flash('message',"Usuario creado con exito, se envió una confirmacion al correo!" );  
            }
            
            return redirect('/');

        } catch (\Throwable $th) {
            Session::flash('message',"Error, no se logró registrar al usuario" );
            return redirect('/register');
        }
    }

}
