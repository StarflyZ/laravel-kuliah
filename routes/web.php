<?php

use App\Http\Controllers\PlaceController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('kategori.halte');
});

Route::get('/kenalan', function () {
    return view('kenalan', ['nama' => 'Steven']);
});

Route::get('/nama/{id}', function ($id) {
    return 'hallo => '  . $id;
});

Route::get('/admin/tickets', function () {
    return view('admin.tickets');
});

Route::get('/admin/new_ticket', function () {
    return view('admin.new_ticket');
});

Route::get('/admin/teams', function () {
    return view('admin.teams');
});

Route::get('/categories', function () {
    return 'Daftar kategori fasum';
});

Route::get('/kategori/halte', function () {
    return view('kategori.halte');
});

Route::get('/fasums', function () {
    return 'Daftar fasums';
});

Route::get('/member', function () {
    return 'Daftar warga kota';
});

Route::resource('place', PlaceController::class);
Route::resource('ticket', TicketController::class);
Route::get('/ticket/show/{id}', [TicketController::class, 'show']);
Route::get('/place/showTotalTicket', [PlaceController::class, 'showTotalTicket']);