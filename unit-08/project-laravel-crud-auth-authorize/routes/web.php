<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\App;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('lang/{locale?}', function ($locale = 'es') {
    switch ($locale) {
        case 'en': echo "El idioma seleccionado es: " . App::currentLocale();
            break;
        default: echo "Qué mal se me da el español";
    }
});
Route::resource('/product', ProductController::class);
/*Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{pro}', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/{pro}/edit', [ProductController::class, 'edit'])->name('product.edit');*/
/*Route::put('/product/{pro}', [ProductController::class, 'update'])->middleware(['auth'])->name('product.update');
Route::patch('/product/{pro}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{pro}', [ProductController::class, 'destroy'])->name('product.destroy');*/

require __DIR__.'/auth.php';
