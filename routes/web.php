<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;
use Illuminate\Http\Request;


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

//Route::get('/', function () {
//    return view('myhome');
//});
Route::view('login', 'login');
//Securite
Auth::routes();

Route::get('/', 'HomeController@index');
Route::view('home', 'home');

Route::view('formcotis', 'formcotis');
Route::view('formparent', 'formparent');

Route::get('parentfamille', 'ParentFormController@index')->name('bilanparent');
Route::get('createfam', 'ParentFormController@create')->name('formparent');
Route::post('lafamille', 'ParentFormController@store')->name('lafamilles');
Route::get('modiffam/{id}', 'ParentFormController@edit');
Route::get('fammodif/{id}', 'ParentFormController@update');
Route::get('suppfam/{id}', 'ParentFormController@delete');
Route::get('/search', 'ParentFormController@search');
Route::post('/famille/getFamille/','ParentFormController@getFamille')->name('famille.getFamille');

Route::get('eleve', 'EleveForm@index')->name('bilaneleve');
Route::get('createeleve', 'EleveForm@create')->name('formeleve');
Route::post('famille', 'EleveForm@store')->name('famille');
Route::get('modifele/{id}', 'EleveForm@edit');
Route::get('elemodif/{id}', 'EleveForm@update');
Route::get('suppele/{id}', 'EleveForm@delete');

Route::get('cotis', 'CotisController@index')->name('bilancotis');
Route::get('createcotis', 'CotisController@create')->name('formcotis');
Route::post('lacotis', 'CotisController@store')->name('lacotis');
Route::get('modifcotis/{id}', 'CotisController@edit');
Route::get('cotismodif/{id}', 'CotisController@update');
Route::get('suppcotis/{id}', 'CotisController@delete');

Route::get('cheque', 'ChequeContoller@index')->name('bilancheque');
Route::get('createcheque', 'ChequeContoller@create')->name('formcheque');
Route::post('lecheque', 'ChequeContoller@store')->name('lecheque');
Route::get('modifcheque/{id}', 'ChequeContoller@edit');
Route::get('chequemodif/{id}', 'ChequeContoller@update');
Route::get('suppcheque/{id}', 'ChequeContoller@delete');

Route::get('souche', 'SoucheContoller@index')->name('bilansouche');
Route::get('createsouche', 'SoucheContoller@create')->name('formsouche');
Route::post('lasouche', 'SoucheContoller@store')->name('lasouche');
Route::get('modifsouche/{id}', 'SoucheContoller@edit');
Route::get('souchemodif/{id}', 'SoucheContoller@update');
Route::get('suppsouche/{id}', 'SoucheContoller@delete');


Route::get('/logout', 'LogoutController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController');
});
