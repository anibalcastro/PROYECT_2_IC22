<?php

namespace App\Http\Controllers;

use Models\Source;
use App;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facade as Debugbar;
Use Session;
Use Redirect;

class SourceController extends Controller
{
    //
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $datosHead['pageTitle'] = "Dashboard - Category";
       $datosHead['css'] = asset('css/source.css');

       $datosMenu =[
        "nameUser"=> Session::get('firstName'),
        "link"=>'http://127.0.0.1:8000/source/create',
        "action"=>'New Source'
       ];
       
       $category = new \App\Models\Admin();

       $datos['head'] = view('shared/head', $datosHead);
       $datos['menu'] = view('shared/menu', $datosMenu);
       $datos['categories'] = $category::all();
       return view('source.dashboard',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Instanciamos el modelo Admin
        $category = new \App\Models\Admin();

        //DataHead
        $datosHead = [
            "pageTitle" =>'Create Source / N-Noticias',
            "css" => asset('css/source.css')
        ];
        
        //DataMenu
        $datosMenu =[
         "nameUser"=> Session::get('firstName'),
         "link"=>'http://127.0.0.1:8000/source/create',
         "action"=>'New Source'
        ];

        //DataForm
        $datosFormulario =
        [
            "url"=> "",
            "nameSource"=>"",
            "idCategory"=>null,
            "categories" => $category::all()
        ];

        //Data view
        $datos['head'] = view('shared/head', $datosHead);
        $datos['menu'] = view('shared/menu', $datosMenu);
        $datos['formSource'] = view('source.formSource', $datosFormulario);
        
        return view('source.createSource', $datos);

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        //
        return view('source.editSource');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Source $source)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        //
    }
}
