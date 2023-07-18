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
use App\Http\Controllers\Bot\HomeBotController;
use App\Http\Controllers\Web\AccountSellWebController;
use App\Http\Controllers\Web\EventWebController;

Route::get('accounts-sales', [AccountSellWebController::class, 'index'])->name('web.accounts-sales.idnex');
Route::get('events', [EventWebController::class, 'index'])->name('web.events.index');

Route::get('/', function () {
    return view('welcome');
    // return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'auth.admin'])->prefix('admin')->name('admin.')->group(function () {

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

    Route::DELETE('accounts-sales/image-remove/{id}/{image}', [AccountSellController::class, 'deleteImage'])
        ->name('accounts-sales.delete.image');
    Route::resource('accounts-sales', AccountSellController::class)->except(['show']);
});

Route::middleware(['auth'])->prefix('bot')->name('bot.')->group(function(){
    Route::get('/', [HomeBotController::class, 'index'])->name('index');
    Route::get('/accounts/{account}/show', [HomeBotController::class, 'show'])->name('accounts.show');
    Route::put('/accounts/{account}/update-settings', [HomeBotController::class, 'updateSettings'])
    ->name('accounts.update.settings');
});

require __DIR__.'/auth.php';
