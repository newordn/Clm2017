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

// welcome and choice view
Route::get('/', function () {
    return view('welcome');
});

// inscription routes
Route::get('inscription', ['uses'=> 'InscriptionController@getForm', 'as' => 'inscription']);
Route::post('inscription', ['uses'=> 'InscriptionController@postForm', 'as' => 'inscriptionPost']);
Route::get('inscription/modify/{id}',['uses'=>'InscriptionController@modifyForm','as'=>'inscriptionModifyGet']);
Route::post('inscription/modify',['uses'=>'InscriptionController@modifyPost','as'=>'inscriptionModifyPost']);

// users app routes
Route::post('login',['uses'=>'UserController@login','as'=>'login']);
Route::post('signIn',['uses'=>'UserController@store','as'=>'signIn']);
Route::get('logOut',['uses'=>'UserController@logOut','as'=>'logOut']);
Route::get('delete/{id}','UserController@destroy');

// administration routes
Route::resource('administration','AdministrationController');

// tresor routes
Route::get('tresorerie',['uses'=>'TresorerieController@getTresor','as'=>'tresorerie']);



// to show the student for a particular class

Route::get('showClass/{category}/{level}/{module}','ClassController@show');

// classes routes
// to propose all the classes

Route::get('class/{category}/{level}/{module}','ClassController@propose');

Route::post('newClass','ClassController@create');


Route::get('class',['uses'=>'ClassController@getClass','as'=>'class']);

// pdf routes

Route::get('pdf_inscription/{id}','PdfController@getPdfInscription');
Route::get('pdf_bulletin/{id}/{decision}/{book}','PdfController@getPdfBulletin');

Route::get('pdf_liste_students/{id}','PdfController@getPdfListeStudents');


// bulletin routes

Route::get('bulletin/{eleve_id}','BulletinController@getBulletin');
Route::post('bulletin',['uses'=>'BulletinController@postBulletin','as'=>'bulletin']);

// abscences route
Route::get('absence/{eleve_id}',['uses'=>'AbsenceController@setAbsence','as'=>'absence']);

// searchs route

Route::post('/search',['uses'=>'SearchController@search','as'=>'search']);

