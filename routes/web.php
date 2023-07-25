<?php

use App\Http\Controllers\AccountSellController;
use App\Http\Controllers\AccountTransferAdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    AccountAdminController,
    HomeAdminController,
    PermissionAdminController,
    RoleAdminController,
    UserAccountAdminController,
    UserAdminController,
};
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Bot\HomeBotController;
use App\Http\Controllers\Web\AccountSellWebController;
use App\Http\Controllers\Web\EventWebController;

Route::get('accounts-sales', [AccountSellWebController::class, 'index'])->name('web.accounts-sales.idnex');
Route::get('events', [EventWebController::class, 'index'])->name('web.events.index');

Route::get('/', [AuthenticatedSessionController::class, 'create']);

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

    Route::name('user.')->group(function() {
        Route::resource('users/{user}/accounts', UserAccountAdminController::class);
        Route::put('users/{user}/accounts/{account}/update-settings', [UserAccountAdminController::class, 'updateSettings'])
            ->name('accounts.update.settings');
    });

    Route::resource('accounts', AccountAdminController::class)->only('index');
    // Route::put('accounts/{account}/update-settings', [AccountAdminController::class, 'updateSettings'])
    //     ->name('accounts.update.settings');

    Route::delete('accounts-sales/image-remove/{id}/{image}', [AccountSellController::class, 'deleteImage'])
        ->name('accounts-sales.delete.image');
    Route::resource('accounts-sales', AccountSellController::class)->except(['show']);

    /**
     * Accounts Transfer
     */
    Route::get('account-transfer', [AccountTransferAdminController::class, 'index'])->name('account-transfer.index');
    Route::get('account-transfer/search-account', [AccountTransferAdminController::class, 'searchAccount'])->name('ajax.account-transfer.find');
    Route::put('account-transfer/transfer', [AccountTransferAdminController::class, 'transferAccount'])->name('ajax.account-transfer.transfer');
});

Route::middleware(['auth'])->prefix('bot')->name('bot.')->group(function(){
    Route::get('/', [HomeBotController::class, 'index'])->name('index');
    Route::get('/accounts/{account}/show', [HomeBotController::class, 'show'])->name('accounts.show');
    Route::put('/accounts/{account}/update-settings', [HomeBotController::class, 'updateSettings'])
        ->name('accounts.update.settings');
    Route::get('profile', [HomeBotController::class, 'userProfile'])->name('profile');
    Route::put('profile', [HomeBotController::class, 'userProfileUpdate']);
});

require __DIR__.'/auth.php';
