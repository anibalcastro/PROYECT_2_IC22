<?php

namespace App\Http\Controllers;

use App\Model\Source;
use Illuminate\Http\Request;
use DB;
use Barryvdh\Debugbar\Facade as Debugbar;
Use Session;
Use Redirect;

class SourceController extends Controller
{

    public function validarSessionUsuario(){
        if(Session::get('session_start')){
            
            $roleId = Session::get('roleId');
            
            if ($roleId!=1){
                return  true;
            }
            else {
                return false;
            }
        }
        else{
            return false;
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(SourceController::validarSessionUsuario()){
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
            "link"=>'http://127.0.0.1:8000/source/mysource',
            "action"=>'New Source'
            ];

            //DataForm
            $datosFormulario =
            [
                "url"=> "",
                "nameSource"=>"",
                "idCategory"=>null,
                "categories" => $category::all(),
                "idUser" => Session::get('idUser'),
            ];

            //Data view
            $datos['head'] = view('shared/head', $datosHead);
            $datos['menu'] = view('shared/menu', $datosMenu);
            $datos['formSource'] = view('source.formSource', $datosFormulario);

            return view('source.createSource', $datos);
        }
        else{
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
        //
        //Obtenemos lo que viene por request
        $datosSource = request()->except('_token','btnSave');

        //Instanciamos
        $sourceModel = new \App\Models\Source();
        
        //Obtenemos resultados
        $resultDB = $sourceModel::all()
        ->where('nameSource', $datosSource['nameSource'])
        ->where('url', $datosSource['url'])
        ->where('idCategory', $datosSource['idCategory'])
        ->where('idUser', $datosSource['idUser'])
        ->toArray();
            
        if (sizeof($resultDB) >= 1){
            Session::flash('message','Error la fuente ya existe');
            Debugbar::addMessage('Error categoria ya existe', 'Error');
            $redirect = Redirect::to('/source/create');
        }
        else 
        {
            $sourceModel::insert($datosSource);
            Session::flash('message','Fuente agregada con exito');
            Debugbar::addMessage('Agregado', 'aceptado');
            $redirect = Redirect::to('/source/mysource');
        }

        return $redirect;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(SourceController::validarSessionUsuario()){
            //
            $sourceModel = new \App\Models\Source();
            $category = new \App\Models\Admin();

            $resultDB =  $sourceModel::all()
            ->where('id', $id)->toArray();
        
            foreach($resultDB as $iterador){
                $idSource = $id;
                $nameSource = $iterador['nameSource'];
                $urlSource = $iterador['url'];
                $idCategory = $iterador['idCategory']; 
            }

            //DataHead
            $datosHead = [
                "pageTitle" =>'Create Source / N-Noticias',
                "css" => asset('css/source.css')
            ];
                    
            //DataMenu
            $datosMenu = [
                "nameUser"=> Session::get('firstName'),
                "link"=>'http://127.0.0.1:8000/source/mysource',
                "action"=>'New Source'
            ];

            //DataForm
            $datosForm = [
                'idSource' => $id,
                'nameSource' => $nameSource,
                'url' => $urlSource,
                'idCategory' => $idCategory,
                'categories' => $category::all(),
                'idUser' => Session::get('idUser')
            ];

            
            //Data view
            $datos['head'] = view('shared/head', $datosHead);
            $datos['menu'] = view('shared/menu', $datosMenu);
            $datos['id'] = $id;
            $datos['formSource'] = view('source.formSource', $datosForm);


            return view('source.editSource', $datos);
        }
        else{
            return Redirect::to('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosSource = request()->except('_token','btnSave','_method');
        $sourceModel = new \App\Models\Source();
        $sourceModel::where('id','=',$id)->update($datosSource);
        Session::flash('message','Edit are sucesfull');
        return Redirect::to('source/mysource');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $source = new \App\Models\Source();
        $source::destroy($id);

        //Faltan eliminar las noticias que contengan el id de la fuente.
        
        Session::flash('message','Delete are sucesfull');
        return \redirect('source/mysource');
    }


    /**
     * Function to show source
     */
    public function sources(){
        if(SourceController::validarSessionUsuario()){
            $resultDB = DB::table('sources')
            ->select('sources.id', 'sources.nameSource', 'sources.url', 'categories.nameCategory')
            ->join('categories', 'categories.id', '=', 'sources.idCategory')
            ->where('idUser', Session::get('idUser'))->get();
    
            $datosHead['pageTitle'] = "My source / N-Noticias";
            $datosHead['css'] = asset('css/source.css');
     
            $datosMenu =[
             "nameUser"=> Session::get('firstName'),
             "link"=>'http://127.0.0.1:8000/news',
             "action"=>'My news'
            ];
            
     
            $datos['head'] = view('shared/head', $datosHead);
            $datos['menu'] = view('shared/menu', $datosMenu);
            $datos['sources'] = json_decode ($resultDB);
    
            return view('source.showSource', $datos);
        }
        else{
            return Redirect::to('/');
        }
    }
}
