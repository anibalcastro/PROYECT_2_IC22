<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
Use Session;
Use Redirect;

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
        $datos['categories'] = Admin::paginate(20);
        $datos['pageTitle'] = "Dashboard - Category";
        $datos['user'] = "Anibal Castro";
        return view('admin.dashboard', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *s
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['pageTitle'] = "Create - Category";
        $datos['user'] = "Anibal Castro";
        //return view
        return view('admin.createCategory', $datos);
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
        $datosCategory = request()->except('_token','btnSave');
        $resultDB = Admin::all();
        $mensaje = "";
        $redirect= "";
        /*
        foreach($resultDB as $categoria){
            if ($resultDB['nameCategory'] == $datosCategory['nameCategory']){
                Session::flash('message','Error categoria ya existe');
                $redirect = Redirect::to('/admin/create');
                break;
            }
            else{
                Admin::insert($datosCategory);
                Session::flash('message','Agregado con exito');
                $redirect = Redirect::to('/admin');
            }
        }
        */

        Admin::insert($datosCategory);
        Session::flash('message','Agregado con exito');
        $redirect = Redirect::to('/admin');



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
        $category = Admin::findOrFail($id);
        $data['pageTitle'] = 'Edit Category / N-Noticias';
        $data['user'] = 'Anibal Castro';
        return view('admin.editCategory',$data ,compact('category'));
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
        $datosCategory = request()->except('_token','btnSave','_method');
        Admin::where('id','=',$id)->update($datosCategory);
        Session::flash('message','Edit are sucesfull');
        $redirect = Redirect::to('/admin');
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
        return \redirect('admin');
    }
}
