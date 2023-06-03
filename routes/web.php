<?php

use App\Http\Controllers\AccountSellController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    AccountAdminController,
    HomeAdminController,
    PermissionAdminController,
    RoleAdminController,
    UserAdminController,
};

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [HomeAdminController::class, 'index'])
        ->name('index');
    Route::resource('roles', RoleAdminController::class)

    ->except(['edit', 'update']);
    Route::post('roles/{id}/permissions', [RoleAdminController::class, 'syncPermissions'])
        ->name('roles.permissions');
    Route::resource('permissions', PermissionAdminController::class)
        ->except(['edit', 'update', 'show']);

    Route::resource('users', UserAdminController::class);

    Route::resource('accounts', AccountAdminController::class);
    Route::put('accounts/{account}/update-settings', [AccountAdminController::class, 'updateSettings'])
        ->name('accounts.update.settings');

    Route::resource('accounts-sales', AccountSellController::class);
});

require __DIR__.'/auth.php';
