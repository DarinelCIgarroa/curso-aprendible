<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view ('home');
})->name('home');

Route::view('/about', 'about')->name('about');

// Route::get ('/project',                 'ProjectsController@index')     ->name('projects.index');
// Route::get ('/project/create',          'ProjectsController@create')    ->name('projects.create');
// Route::post('/project',                 'ProjectsController@store')     ->name('projects.store');
// Route::get ('/project/{project}',       'ProjectsController@show')      ->name('projects.show');
// Route::get ('project/{project}/edit',   'ProjectsController@edit')      ->name('projects.edit');
// Route::put ('project/{project}',        'ProjectsController@update')    ->name('projects.update');
// Route::delete('project/{project}',      'ProjectsController@destroy')   ->name('projects.destroy');

Route::resource('project', 'ProjectsController')->names('projects');

Route::put('project/{project}/restore', 'ProjectsController@restore')->name('projects.restore');

Route::delete('project/{project}/forcedelete', 'ProjectsController@forceDelete')->name('projects.forceDelete');

Route::view('/contact', 'contact')->name('contact');

Route::post('contact','MessagesController@store')->name('contact');

Auth::routes(['register' => false]);

Route::get('/category/{category}', 'CategoryController@index')->name('categories.show');
