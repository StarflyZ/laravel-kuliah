<?php

use App\Http\Controllers\CitizenController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContributionProductController;

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

Route::get('/', [PlaceController::class, 'index']);

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
})->name('kategori.halte');

Route::get('/fasums', function () {
    return 'Daftar fasums';
});

Route::get('/member', function () {
    return 'Daftar warga kota';
});

Route::resource('place/index', PlaceController::class);

Route::resource('ticket', TicketController::class);

Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.index');

Route::get('/ticket/show/{id}', [TicketController::class, 'show']);

Route::get('/place/showTotalTicket', [PlaceController::class, 'showTotalTicket'])->name('place.totalticket');

Route::get('/place/showlist', [PlaceController::class, 'showlist'])->name('place.showlist');

Route::get('/place/index', [PlaceController::class, 'index'])->name('place.index');

Route::get('/layouts', function () {
    return view('layouts/conquer2');
});

Route::get('/tampilticket', function () {
    return view('tampil');
});

Route::post("/place/showinfo", [PlaceController::class, 'showinfo'])->name("place.showinfo");

Route::post("/place/showTickets", [PlaceController::class, 'showTickets'])->name("place.showTickets");

Route::resource("/contribution", ContributionController::class);

Route::resource("/citizen", CitizenController::class);

Route::resource("/product", ProductController::class);

Route::resource("/employee", EmployeeController::class);

Route::get('/contributions_product/formcreate', [ContributionController::class, 'contributionProduct_create'])->name('contribution.contributionProduct_create');

Route::post('/contributions/product/formcreate', [ContributionController::class, 'contributionProduct_store'])->name('contribution.contributionProducts_store');

Route::post('/contributions/product/store', [ContributionController::class, 'contributionProduct_store'])->name('contribution.contributionProduct_store');
