
@extends('layouts.master')
  @section('content')
 <div class="row">       
   <div class="col-sm-4">          
       <img src='{{$arrayPeliculas->poster}}' height=400/>
         
      </div>      
   <div class="col-sm-8">           
      <div>
         <h4 style="min-height:45px;margin:5px 0 10px 0">
         <b>{{$arrayPeliculas->title}}</b>
         </h4>
      </div>
      <div>
         <h4 style="min-height:45px;margin:5px 0 10px 0">
         Año: {{$arrayPeliculas->year}}
         </h4>
      </div>
      <div>
         <h4 style="min-height:45px;margin:5px 0 10px 0">
         Director: {{$arrayPeliculas->director}}
         </h4>
      </div>
      <div>
         <p style="min-height:45px;margin:5px 0 10px 0">
         <b>Resumen</b>: {{$arrayPeliculas->synopsis}}
         </p>
      </div>
      <div>
         <p style="min-height:45px;margin:5px 0 10px 0">
            @if($arrayPeliculas->rented)
               <b>Estado</b>: Pelicula Actualmente alquilada
            @else 
               <b>Estado</b>: Pelicula Disponible
            @endif
         
         </p>
      </div> 
      
      <div>
            @if($arrayPeliculas->rented)
               <a class="btn btn-danger" href='#' role='button'>Devolver Pelicula</a>
            @else 
            <a class="btn btn-primary" href='#' role='button'>Alquilar Pelicula</a>
            @endif
      
         <a class="btn btn-warning" href='{{url("/catalog/edit/".$arrayPeliculas->id)}}' role='button'>
            <i class="fas fa-pen"></i>
            Editar Pelicula
         </a>
         <a class="btn btn-danger" href="/catalog" role='button'>
            <i class="fas fa-times"></i>
            Eliminar pelicula
         </a>
         <a class="btn btn-outline-dark" href='{{url("/catalog/")}}' role='button'>
            <i class="fas fa-angle-left"></i>
            Volver listado
         </a>        
      </div>            
   </div> 
</div>    
 @stop
