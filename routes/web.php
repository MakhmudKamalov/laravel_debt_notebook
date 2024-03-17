<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\Controller;
use App\Livewire\ClientHistory;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

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
  return view('main-page.aldingi_index');
});
Route::get('/main', [Controller::class, 'homepage'])->name('main')->middleware('auth');

Route::get('/login', function () {
  return view('main-page.aldingi_index');
})->name('login');

// Register
Route::get('/register', [Controller::class, 'register'])->name('register-page');
Route::post('/register-form', [Controller::class, 'registerForm'])->name('register-form');
Route::post('/login-tekseriw', [Controller::class, 'loginCheck'])->name('login-tekseriw');
Route::get('/logout', [Controller::class, 'logout'])->name('logout');

// Add client
Route::get('/add-client/{client?}', [ClientController::class, 'addClient'])->name('add-client')->middleware('auth');
Route::post('/create-client', [ClientController::class, 'createClient'])->name('create-client')->middleware('auth');

// ALl clients
Route::get('/all-clents',  [ClientController::class, 'allClientsPage'])->name('all-clients-page')->middleware('auth');

// Update client
Route::post('/update-client', [ClientController::class, 'updateClient'])->name('update-client')->middleware('auth');

// Client history
Route::get('/client-history/{id}', [ClientController::class, 'clientHistoryPage'])->name('client-history')->middleware('auth');

// Profile page
Route::get('/profile', [Controller::class, 'profilePage'])->name('profile-page')->middleware('auth');
