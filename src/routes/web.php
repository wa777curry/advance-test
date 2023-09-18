<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ManagementController;

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

Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
Route::post('/contacts/confirm', [ContactController::class, 'confirm'])->name('contacts.confirm');
Route::post('/contacts/thanks', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/thanks', [ContactController::class, 'thanks'])->name('contacts.thanks');
Route::post('/', [ContactController::class, 'back'])->name('contacts.back');

Route::get('/contacts/management', [ManagementController::class, 'find']);
Route::post('/contacts/management', [ManagementController::class, 'search'])->name('contacts.search');