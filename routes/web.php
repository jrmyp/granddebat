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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/debates/{debate}', 'DebateController@show');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/proposals/{proposal}', 'ProposalController@show');
    Route::get('/questions/{question}', 'QuestionController@show');
    Route::get('/questions/{question}/tags/create', 'TagController@create');
    Route::post('/questions/{question}/tags', 'TagController@store');
    Route::get('/responses/{response}', 'ResponseController@show');
    Route::post('/responses/{response}', 'ResponseController@update');
    Route::get('/tags/{tag}/edit', 'TagController@edit');
    Route::post('/tags/{tag}', 'TagController@update');
    Route::delete('/tags/{tag}', 'TagController@delete');
});