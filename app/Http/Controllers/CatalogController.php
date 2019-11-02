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
    public function postCreate(Request $request) {
        $p=new Movie;
            $p->title='';
            $p->year='';
            $p->director = '';
            $p->poster ='';
            $p->synopsis = ''; $p->save();
        return view('catalog'); 
    }
    public function putEdit(Request $request,$id) {
        $peliculas = Movie::FindOrFail($id);
        return view('catalog.edit', array('peliculas'=>$peliculas)); 
    }
}
