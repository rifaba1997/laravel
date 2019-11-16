<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Movie;

class CatalogController extends Controller
{
    
    public function getIndex() {
        #$peliculas=DB::table('movies')->get();
        $peliculas = Movie::all();
        return view('catalog.index',array('peliculas'=>$peliculas)); 
    }
    public function getShow($id) {
        $peliculas = Movie::all();
        return view('catalog.show', array('arrayPeliculas'=>$peliculas[$id-1])); 
    }
    public function getCreate(Request $request) {
        return view('catalog.create'); 
    }
    public function getEdit(Request $request,$id) {
        $peliculas = Movie::FindOrFail($id);
        return view('catalog.edit', array('peliculas'=>$peliculas)); 
    }
    public function postCreate(Request $request){
        $newMovie = new Movie;
        $newMovie->title = $request->input('title');
        $newMovie->year = $request->input('year');
        $newMovie->director = $request->input('director');
        $newMovie->poster = $request->input('poster');
        $newMovie->synopsis = $request->input('synopsis');
        $newMovie->save();
        notify('Pelicula creada con exito')->type('success');
        return redirect()->action('CatalogController@getIndex');
    }
    public function putEdit(Request $request,$id){
        $editMovie = Movie::FindOrFail($id);
        $editMovie->title = $request->input('title');
        $editMovie->year = $request->input('year');
        $editMovie->director = $request->input('director');
        $editMovie->poster = $request->input('poster');
        $editMovie->synopsis = $request->input('synopsis');
        $editMovie->save();
        notify('Pelicula editada con exito')->type('success');
        return redirect()->action('CatalogController@getShow',$id);
        
        
    }
}
