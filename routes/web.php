<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientsRequestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Models\ClientsRequest;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\Routing\RequestContext;

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
    return view('welcome');
});

################# Basic Routes ###########################
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard') ;
});
###########################################################

################# Category Routes ###########################
Route::middleware('auth')->group(function () {
    Route::resource('/categories', CategoryController::class) ;
    Route::resource('/devices', DeviceController::class) ;
});
###########################################################

################# Request Routes ###########################
Route::middleware('auth')->group(function () {
    Route::get('show_requests', [ClientsRequestController::class,'index'])->name('show_requests') ;
});
###########################################################












Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
