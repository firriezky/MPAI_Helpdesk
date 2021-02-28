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
    return view('landing');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ticket/new-ticket', 'TicketController@index');

Route::get('/ticket/find/{ticketNum}', 'TicketController@checkTicket');

Route::get('/ticket/find', 'TicketController@findIndex')->name("find-ticket-index");
Route::get('/ticket/find', 'TicketController@find')->name("find-ticket-ops");

Route::get('/admin/list-ticket', 'TicketController@listIndex')->name("list-ticket");

Route::post('/create-ticket', 'TicketController@create')->name('create-ticket');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');
