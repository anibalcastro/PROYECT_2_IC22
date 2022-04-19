<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Illuminate\Http\Request;
use App\Models\Admin;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['pageTitle'] = "Dashboard News / N-Noticias";
        $datos['nameUser'] = 'Anibal';
        $datos['link'] = 'http://127.0.0.1:8000/source/create';
        $datos['action'] = 'New Source';

        return view('source/dashboard', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datosHead['pageTitle'] = "Create source / N-Noticias";
        $datosMenu =[
            "nameUser"=>"Anibal",
            "link"=>'http://127.0.0.1:8000/source',
            "action"=>'Source'
        ];

        $datos['categories'] = Admin::all();
        $datos['head'] = view('sharedAdmin/head', $datosHead);
        $datos['menu'] = view('shared/menu', $datosMenu);

        return view('source/createSource', $datos);

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
