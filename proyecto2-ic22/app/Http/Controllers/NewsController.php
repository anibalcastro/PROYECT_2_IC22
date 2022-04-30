<?php

namespace App\Http\Controllers;

use App\Model\News;
use Illuminate\Http\Request;
use DB;
use Barryvdh\Debugbar\Facade as Debugbar;
Use Session;
Use Redirect;

class NewsController extends Controller
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
        "link"=>'http://127.0.0.1:8000/source/mysource',
        "action"=>'New Source'
       ];
       
       $category = new \App\Models\Admin();
      
       $resultDb = DB::table('news')
       ->select('news.title', 'news.shortDescription', 'news.permanLink', 'news.date' ,'sources.nameSource' ,'categories.nameCategory', 'news.tags')
       ->join('categories', 'categories.id', '=', 'news.categoryId')
       ->join('sources','sources.id', '=', 'news.sourceId')
       ->where('userId', Session::get('idUser'))
       ->orderBy('news.date', 'DESC')
       ->get();





       $datos['head'] = view('shared/head', $datosHead);
       $datos['menu'] = view('shared/menu', $datosMenu);
       $datos['categories'] = $category::all();
       $datos['news'] = json_decode($resultDb);
       $datos['tags'] = "";


       return view('source.dashboard',$datos);
    }

    /**
     * Search news by category
     */
    public function searchNewsByCategory(Request $request){
        $datosCategoria = request()->except('_token','btnSearch');
        $idCategory = $datosCategoria['idCategory'];

        $resultDbNews = DB::table('news')
        ->select('news.title', 'news.shortDescription', 'news.permanLink', 'news.date' ,'sources.nameSource' ,'categories.nameCategory', 'news.tags')
        ->join('categories', 'categories.id', '=', 'news.categoryId')
        ->join('sources','sources.id', '=', 'news.sourceId')
        ->where('userId', Session::get('idUser'))
        ->Where('news.categoryId', '=', $idCategory)
        ->orderBy('news.date', 'DESC')
        ->get();

        $resultDbTags = DB::table('tags')
        ->select('tags.nameTag')
        ->where('idCategory', '=', $idCategory)
        ->get();

        $datosHead['pageTitle'] = "Dashboard - Category";
        $datosHead['css'] = asset('css/source.css');
 
        $datosMenu =[
         "nameUser"=> Session::get('firstName'),
         "link"=>'http://127.0.0.1:8000/source/mysource',
         "action"=>'New Source'
        ];
        
        $category = new \App\Models\Admin();

        $datos['head'] = view('shared/head', $datosHead);
        $datos['menu'] = view('shared/menu', $datosMenu);
        $datos['categories'] = $category::all();
        $datos['news'] = json_decode($resultDbNews);
        $datos['tags'] = json_decode($resultDbTags);
        $datos['idCategory'] = $idCategory;
 
 
        return view('source.dashboard',$datos);

        
        
    }

    /**
     * Search news by text
     */
    public function searchNewByText(Request $request){

        $datosBuscar = request()->except('_token','btnSearch');
        $Busqueda = $datosBuscar['inpSearch'];

        $resultDb = DB::table('news')
        ->select('news.title', 'news.shortDescription', 'news.permanLink', 'news.date' ,'sources.nameSource' ,'categories.nameCategory', 'news.tags')
        ->join('categories', 'categories.id', '=', 'news.categoryId')
        ->join('sources','sources.id', '=', 'news.sourceId')
        ->where('userId', Session::get('idUser'))
        ->Where('news.title', 'like', "%$Busqueda%")
        ->orderBy('news.date', 'DESC')
        ->get();

        $datosHead['pageTitle'] = "Dashboard - Category";
        $datosHead['css'] = asset('css/source.css');
 
        $datosMenu =[
         "nameUser"=> Session::get('firstName'),
         "link"=>'http://127.0.0.1:8000/source/mysource',
         "action"=>'New Source'
        ];
        
        $category = new \App\Models\Admin();

        $datos['head'] = view('shared/head', $datosHead);
        $datos['menu'] = view('shared/menu', $datosMenu);
        $datos['categories'] = $category::all();
        $datos['news'] = json_decode($resultDb);
        $datos['tags'] = "";
        
 
 
        return view('source.dashboard',$datos);

    }

    /**
     * Search news by Tags
     */
    public function searchNewsByTag(Request $request){
        $datosEtiquetas = request()->except('_token','btnSearch');
        $tag = $datosEtiquetas['nameTag'];
        $idCategory = $datosEtiquetas['idCategory'];

        $resultDb = DB::table('news')
        ->select('news.title', 'news.shortDescription', 'news.permanLink', 'news.date' ,'sources.nameSource' ,'categories.nameCategory', 'news.tags')
        ->join('categories', 'categories.id', '=', 'news.categoryId')
        ->join('sources','sources.id', '=', 'news.sourceId')
        ->where('userId', Session::get('idUser'))
        ->Where('news.tags', 'like', "%$tag%")
        ->orderBy('news.date', 'DESC')
        ->get();

        $resultDbTags = DB::table('tags')
        ->select('tags.nameTag', 'tags.idCategory')
        ->where('idCategory', '=', $idCategory)
        ->get();

        $datosHead['pageTitle'] = "Dashboard - Category";
        $datosHead['css'] = asset('css/source.css');
 
        $datosMenu =[
         "nameUser"=> Session::get('firstName'),
         "link"=>'http://127.0.0.1:8000/source/mysource',
         "action"=>'New Source'
        ];
        
        $category = new \App\Models\Admin();

        $datos['head'] = view('shared/head', $datosHead);
        $datos['menu'] = view('shared/menu', $datosMenu);
        $datos['categories'] = $category::all();
        $datos['news'] = json_decode($resultDb);
        $datos['tags'] = json_decode($resultDbTags);
        $datos['idCategory'] = $idCategory;
 
 
        return view('source.dashboard',$datos);
    }
}
