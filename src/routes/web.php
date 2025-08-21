<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Contact\ContactMessageController;
use Laravel\Fortify\Fortify;


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

Route::get('/', [ContactController::class, 'index']);
Route::post('auth/register', [ContactController::class, 'register'] );
Route::get('/admin', [AdminContactController::class, 'index']);
Route::get('/admin/contacts/{contact}', [AdminContactController::class, 'show']);

Route::get('/form', [ContactMessageController::class, 'index'])->name('contact.form');
Route::post('/contact/confirm', [ContactMessageController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact/store', [ContactMessageController::class, 'store'])->name('contact.store');
Route::get('/contact/thanks', [ContactMessageController::class, 'thanks'])->name('contact.thanks');
