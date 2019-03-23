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

Route::get('showClass/{termId}/{category}/{level}/{module}','ClassController@show');

// classes routes
// to propose all the classes


Route::post('new_class','ClassController@create');


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
// presence route

Route::get('presence/{eleve_id}',['uses'=>'AbsenceController@setPresence','as'=>'presence']);
// searchs route
Route::get('search/{student_id}',['uses'=>'SearchController@search1','as'=>'search1']);
Route::post('/search',['uses'=>'SearchController@search','as'=>'search']);


// terms route


Route::get('terms',['uses'=>'TermsController@getTerms','as'=>'terms']);
Route::get('term/{term_id}',['uses'=>'TermsController@getTerm','as'=>'term']);
Route::post('open_term/{term_id}',['uses'=>'TermsController@openTerm','as'=>'reactivateTerm']);

Route::post('terms', ['uses'=> 'TermsController@postTerm', 'as' => 'termSave']);
Route::post('close_term/{term_id}',['uses'=>'TermsController@closeTerm','as'=>'closeTerm']);

// courses route
Route::get('courses',['uses'=>'CourseController@getCourses','as'=>'courses']);

// rights route

Route::post('right',['uses'=>'RightController@setRight','as'=>'setRight']);

// forward a student
Route::post('/forward/{id}',['uses'=>'ForwardController@forward','as'=>'forward']);