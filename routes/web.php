<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;

use App\Models\Customer;
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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/feedback', function () {
    return Inertia::render('Feedback2');
})->name('feedback');


Route::get('/formregister', function () {
    return Inertia::render('Form');
})->name('formregister');



Route::get('/manajemen', function () {
    $customers = new Customer;
        $customers = $customers
        ->get();
        return Inertia::render('Manajemen', [
            'customers' => $customers
        ]);
})->name('manajemen');

Route::post('/deletecustomer', [UserController::class, 'deleteCustomer']);


// Route::get('/konfirmasi/{id}', function ($id) {
//     dd($id);
//     return Inertia::render('Manajemen');
// })->name('konfirmasi');

Route::post('/submitform', [UserController::class, 'store']);
Route::post('/submitfeedback', [CustomerController::class, 'store']);
Route::post('/submitformregister', [CustomerController::class, 'storeForm']);
Route::post('/submitediteduser', [UserController::class, 'storeEditedUser']);


require __DIR__.'/auth.php';
