<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\YpController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/yp/add', [YpController::class, 'add'])->middleware(['auth', 'verified'])->name('yp.add');
Route::post('/yp/store', [YpController::class, 'store'])->middleware(['auth', 'verified'])->name('yp.store');
Route::get('/yp/list', [YpController::class, 'list'])->middleware(['auth', 'verified'])->name('yp.list');
// Route::get('/yp/collect', [YpController::class, 'collect'])->middleware(['auth', 'verified'])->name('yp.collect');
Route::post('/yp/add-points', [YpController::class, 'addPoints'])->middleware(['auth', 'verified'])->name('yp.addpoints');
Route::get('/yp/leaderboards', [YpController::class, 'leaderboards'])->middleware(['auth', 'verified'])->name('yp.leaderboards');

require __DIR__.'/auth.php';
