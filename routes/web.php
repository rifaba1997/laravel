<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# PANTALLA PRINCIPAL
/*
Route::get('/', function () {
    return view('principal');
});

# Login
Route::get('/login', function () {
    return view('login');
});
#
Route::get('/logout', function () {
    return view('logout');
});

Route::get('/catalog', function () {
    return view('catalog');
});

Route::get('/catalog/show/{id}', function ($id) {
    return view('catalogShow',['id'=>$id]);
});

Route::get('/catalog/create', function () {
    return view('catalogCreate');
});

Route::get('/catalog/edit/{id}', function ($id) {
    return view('catalogEdit',['id'=>$id]);
});

Route::get('/', function () {
    return view('home');
});

Route::get('/auth', function () {
    return view('auth.login');
});
Route::get('/catalog', function () {
    return view('catalog.index');
});

Route::get('/catalog/show/{id}', function ($id) {
    return view('catalog.show',['id'=>$id]);
});
Route::get('/catalog/create', function () {
    return view('catalog.create');
});
Route::get('/catalog/edit/{id}', function ($id) {
    return view('catalog.edit',['id'=>$id]);
});
*/
Route::get('/','HomeController@getHome' );


Auth::routes();

#Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/auth', function () {
        return view('auth.login');
    });
    
    Route::get('/catalog','CatalogController@getIndex' );
    
    Route::get('/catalog/show/{id}','CatalogController@getShow');
    
    Route::get('/catalog/create','CatalogController@getCreate' );
    
    Route::get('/catalog/edit/{id}','CatalogController@getEdit');
    
    Route::post('/catalog/create','CatalogController@postCreate');
    
    Route::put('/catalog/edit/{id}','CatalogController@putEdit');

});