<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Livewire\Dashboard\Categories\CategoriesComponent;
use App\Livewire\Dashboard\Categories\CreateCategoryComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard\Events\EventsComponent;
use App\Livewire\Dashboard\Events\CreateEventComponent;

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

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'loginPage'])->name('loginPage');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth:dashboard')->as('dashboard.')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('events', EventsComponent::class)->name('events');
    Route::get('events/create', CreateEventComponent::class)->name('events.create');

    Route::get('categories', CategoriesComponent::class)->name('categories');
    Route::get('categories/create', CreateCategoryComponent::class)->name('categories.create');
});