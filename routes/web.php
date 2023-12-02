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

$controller_path = 'App\Http\Controllers';

// Main Page Route

// pages


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
$controller_path = 'App\Http\Controllers';
    //Home
    Route::get('/', $controller_path . '\pages\HomePage@index')->name('pages-home');
    Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-page-2');

    //Reportes
    Route::get('/reports', $controller_path . '\pages\ReportController@index')->name('pages-reports');
    Route::get('/reports/create', $controller_path . '\pages\ReportController@create')->name('pages-reports-create');
    Route::post('/reports/store', $controller_path . '\pages\ReportController@store')->name('pages-reports-store');
    Route::get('/reports/{id}/edit', $controller_path . '\pages\ReportController@edit')->name('pages-reports-edit');
    Route::put('/reports/{id}/update', $controller_path . '\pages\ReportController@update')->name('pages-reports-update');
    Route::delete('/reports/{id}/delete', $controller_path . '\pages\ReportController@destroy')->name('pages-reports-delete');
    Route::get('/reports/{id}/show', $controller_path . '\pages\ReportController@show')->name('pages-reports-show');
    Route::get('reports/getUserName/{id}', $controller_path . '\pages\ReportController@getUserName')->name('getUserName');


    //Mensajes
    Route::get('/messages', $controller_path . '\pages\Mensaje@index')->name('pages-messages');
    Route::post('/messages/store', $controller_path . '\pages\Mensaje@store')->name('pages-messages-store');
    Route::get('/messages/create', $controller_path . '\pages\Mensaje@create')->name('pages-messages-create');





    //User
    Route::get('/users', $controller_path . '\pages\Users@index')->name('pages-users');
    Route::get('/users/create', $controller_path . '\pages\Users@create')->name('pages-users-create');
    Route::post('/users/store', $controller_path . '\pages\Users@store')->name('pages-users-store');

    Route::get('/users/show/{user_id}', $controller_path . '\pages\Users@show')->name('pages-users-show');
    Route::post('/users/update', $controller_path . '\pages\Users@update')->name('pages-users-update');
    Route::get('/users/destroy/{user_id}', $controller_path . '\pages\Users@destroy')->name('pages-users-destroy');

    //Manual
    Route::get('/manual', $controller_path . '\pages\Manual@index')->name('pages-manual');

// Recursos


});
