<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('product', 'ProductController'); // resource عبارة عن اختصار لكل من التوجيهات Updatd , show , delete , create
Route::get('prodoct/soft/delete/{id}','ProductController@softDelete')
->name('soft.delete');
Route::get('trash/product', 'ProductController@trash')
-> name('Trash');
Route::get('product/back/from/trash/{id}','ProductController@backFromTrash')
->name('product.back');
Route::get('prodoct/delete/forEver/{id}', 'ProductController@deleteForEver')
->name('product.ForceDelete');

