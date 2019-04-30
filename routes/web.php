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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Project Manager
Route::middleware(['auth'])->group(function (){
    Route::resource('companies', 'CompaniesController');
    Route::post('/projects/Adduser','ProjectController@Adduser')->name('projects.Adduser');
    Route::get('/projects/create/{id?}','ProjectController@create');
    Route::resource('projects', 'ProjectController');
    Route::resource('rolse', 'RoleController');
    Route::resource('tasks', 'TaskController');
    Route::resource('users', 'UserController');
    Route::resource('comments','CommentController');
});

