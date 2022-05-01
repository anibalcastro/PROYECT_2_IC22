<?php

namespace App\Http\Controllers;

use App\Models\Admin;
//use App\Http\Controllers\Debugbar;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Http\Request;
use Session;
use Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //     
        try {
            if (AdminController::validateSession()) {

                $datosHead['pageTitle'] = "Dashboard - Category";
                $datosHead['css'] = asset('css/admin.css');

                $datosMenu = [
                    "nameUser" => Session::get('firstName') . " - Admin",
                    "link" => 'http://127.0.0.1:8000/admin/create',
                    "action" => 'Categories'
                ];


                $datos['categories'] = Admin::all();
                $datos['head'] = view('shared/head', $datosHead);
                $datos['menu'] = view('shared/menu', $datosMenu);

                return view('admin.dashboard', $datos);
            } else {
                return Redirect::to('/');
            }
        } catch (\Throwable $th) {
            Session::flash('message', "Error");
            return  Redirect::to('/');
        }
    }

    /**
     * Validate session
     */
    public static function validateSession()
    {
        //       
        if (Session::get('session_start')) {

            $roleId = Session::get('roleId');

            if ($roleId != 1) {
                return  false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function exit()
    {
        //
        session()->forget(['email', 'firstName', 'roleId']);
        session(['session_start' => false]);
        return Redirect::to('/');
    }

    /**
     * Show the form for creating a new resource.
     *s
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (AdminController::validateSession()) {
            $datosHead['pageTitle'] = "Dashboard - Category";
            $datosHead['css'] = asset('css/admin.css');

            $datosMenu = [
                "nameUser" => Session::get('firstName') . " - Admin",
                "link" => 'http://127.0.0.1:8000/admin',
                "action" => 'Categories'
            ];


            $datos['head'] = view('shared/head', $datosHead);
            $datos['menu'] = view('shared/menu', $datosMenu);
            //return view
            return view('admin.createCategory', $datos);
        } else {
            return Redirect::to('/');
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
        //Save category
        $datosCategory = request()->except('_token', 'btnSave');

        $resultDB = Admin::all()->where('nameCategory', $datosCategory['nameCategory'])->toArray();


        if (sizeof($resultDB) >= 1) {
            Session::flash('message', 'Error categoria ya existe');
            $redirect = Redirect::to("/admin/create");
        } else {

            Admin::insert($datosCategory);
            Session::flash('message', 'Agregado con exito');
            $redirect = Redirect::to("/admin");
        }

        return $redirect;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (AdminController::validateSession()) {
            $category = Admin::findOrFail($id);

            $datosHead['pageTitle'] = "Dashboard - Category";
            $datosHead['css'] = asset('css/admin.css');

            $datosMenu = [
                "nameUser" => Session::get('firstName') . " - Admin",
                "link" => 'http://127.0.0.1:8000/admin',
                "action" => 'Categories'
            ];


            $datos['head'] = view('shared/head', $datosHead);
            $datos['menu'] = view('shared/menu', $datosMenu);
            return view('admin.editCategory', $datos, compact('category'));
        } else {
            $redirect = Redirect::to('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosCategory = request()->except('_token', 'btnSave', '_method');
        Admin::where('id', '=', $id)->update($datosCategory);
        Session::flash('message', 'Edit are sucesfull');
        return Redirect::to('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Admin::destroy($id);
        Session::flash('message', 'Delete are sucesfull');
        return \redirect('admin');
    }
}
