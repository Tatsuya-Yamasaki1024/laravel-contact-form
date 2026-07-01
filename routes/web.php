<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TagController;
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

Route::get('/', [ContactController::class, 'create']);

Route::post('/contacts/confirm', [ContactController::class, 'confirm']);

Route::post('/contacts', [ContactController::class, 'store']);

Route::get('/thanks', [ContactController::class, 'thanks'])
    ->name('contacts.thanks');

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])
        ->name('admin.index');

    Route::get('/contacts/{contact}', [AdminController::class, 'show'])
        ->name('admin.show');

    Route::delete('/contacts/{contact}', [AdminController::class, 'destroy'])
        ->name('admin.destroy');

    Route::post('/tags', [TagController::class, 'store'])
        ->name('admin.tags.store');

    Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])
        ->name('admin.tags.edit');

    Route::put('/tags/{tag}', [TagController::class, 'update'])
        ->name('admin.tags.update');

    Route::delete('/tags/{tag}', [TagController::class, 'destroy'])
        ->name('admin.tags.destroy');
});
