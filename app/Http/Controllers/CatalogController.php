<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    
    public function getIndex() {
        $peliculas=DB::table('movies')->get();
        return view('catalog.index',array('peliculas'=>$peliculas)); 
    }
    public function getShow($id) {
        return view('catalog.show', array('id'=>$id,'arrayPeliculas'=>$this->arrayPeliculas[$id])); 
    }
    public function getCreate() {
        return view('catalog.create'); 
    }
    public function getEdit($id) {
        return view('catalog.edit', array('id'=>$this->arrayPeliculas[$id])); 
    }
}
