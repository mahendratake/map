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


//use Route;
//use MapperFacade;
use Cornford\Googlmapper\Facades\MapperFacade;
use Cornford\Googlmapper\model\location;
use Illuminate\Support\Facades\Route;


/*
| process search route and show search html
|
*/
Route::get('/search', function () {
   
   return view('search');
});

/*
| process postajax route and redirect it to controller
|
*/
Route::post('/postajax','AjaxController@post');


