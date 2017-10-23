<?php

namespace SistemaCV\Http\Controllers;

use Illuminate\Http\Request;

use SistemaCV\Articulo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SistemaCV\Http\Requests\ArticuloFormRequest;
use DB;

class ArticuloController extends Controller
{
    public function __construct()
    {
    	
    }
    public function index(Request $request)
    {
        if ($request)
        {   if ($request->get('action')=='buscar') {
                $query=trim($request->get('q'));

            }else{
                $query=trim($request->get('searchText'));
            } 

                $articulos=DB::table('articulo as a')
                ->join('categoria as c','a.idcategoria','=','c.idcategoria')
                ->select('a.idarticulo','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.descripcion','a.imagen','a.estado')
                ->where('a.nombre','LIKE','%'.$query.'%')
                ->orwhere('a.codigo','LIKE','%'.$query.'%')
                ->orderBy('a.idarticulo','desc')
                ->paginate(7);
            

            $categorias=DB::table('categoria')->where('visibilidad','=','1')->get();
            return view('almacen.articulo.index',["articulos"=>$articulos,"searchText"=>$query,"categorias"=>$categorias]);
        }
    }
    public function create()
    {
    	$categorias=DB::table('categoria')->where('visibilidad','=','1')->get();
        return view("almacen.articulo.create",["categorias"=>$categorias]);
    }
    public function store (ArticuloFormRequest $request)
    {
        $articulo=new Articulo;
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->nombre=$request->get('nombre');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->codigo=$request->get('codigo');
        $articulo->stock=$request->get('stock');
        $articulo->estado='Activo';

        if (Input::hasFile('imagen')){
        	$file=Input::file('imagen');
        	$file->move(public_path().'/img/articulos/',$file->getClientOriginalName());
        	$articulo->imagen=$file->getClientOriginalName();
        }

        $articulo->save();
        return Redirect::to('almacen/articulo');

    }
    public function show($id)
    {
        return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);
    }
    public function edit($id)
    {
    	$articulo=Articulo::findOrFail($id);
    	$categorias=DB::table('categoria')->where('visibilidad','=','1')->get();
        return view("almacen.articulo.edit",["articulo"=>$articulo,"categorias"=>$categorias]);
    }
    public function update(ArticuloFormRequest $request,$id)
    {
        $articulo=Articulo::findOrFail($id);
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->nombre=$request->get('nombre');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->codigo=$request->get('codigo');
        $articulo->stock=$request->get('stock');

        if (Input::hasFile('imagen')){
        	$file=Input::file('imagen');
        	$file->move(public_path().'/img/articulos/',$file->getClientOriginalName());
        	$articulo->imagen=$file->getClientOriginalName();
        }
        $articulo->update();
        return Redirect::to('almacen/articulo');
    }
    public function destroy($id)
    {
        $articulo=Articulo::findOrFail($id);
        $articulo->estado='Inactivo';
        $articulo->update();
        return Redirect::to('almacen/articulo');
    }
}
