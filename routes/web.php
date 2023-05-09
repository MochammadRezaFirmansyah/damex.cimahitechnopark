<?php

use App\Http\Controllers\Admin\AssetCategoryController;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\AssetLocationController;
use App\Http\Controllers\Admin\AssetsHistoryController;
use App\Http\Controllers\Admin\AssetStatusController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PengajuanController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\QrCodeController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\ChangePasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/status/{name}', [HomeController::class, 'show'])->name('home2');
    Route::get('/status/details/{name}/{status}', [HomeController::class, 'detail'])->name('details');

    // Permissions
    Route::delete('permissions/destroy', [PermissionsController::class,'massDestroy'])->name('permissions.massDestroy');
    Route::resource('permissions', PermissionsController::class);

    // Roles
    Route::delete('roles/destroy', [RolesController::class, 'massDestroy'])->name('roles.massDestroy');
    Route::resource('roles', RolesController::class);

    // Users
    Route::delete('users/destroy', [UsersController::class ,'massDestroy'])->name('users.massDestroy');
    Route::post('users/parse-csv-import', [UsersController::class ,'parseCsvImport'])->name('users.parseCsvImport');
    Route::post('users/process-csv-import', [UsersController::class ,'processCsvImport'])->name('users.processCsvImport');
    Route::resource('users', UsersController::class);

    // Asset Category
    Route::delete('asset-categories/destroy', [AssetCategoryController::class ,'massDestroy'])->name('asset-categories.massDestroy');
    Route::post('asset-categories/parse-csv-import', [AssetCategoryController::class ,'parseCsvImport'])->name('asset-categories.parseCsvImport');
    Route::post('asset-categories/process-csv-import', [AssetCategoryController::class ,'processCsvImport'])->name('asset-categories.processCsvImport');
    Route::resource('asset-categories', AssetCategoryController::class);

    // Asset Location
    Route::delete('asset-locations/destroy', [AssetLocationController::class ,'massDestroy'])->name('asset-locations.massDestroy');
    Route::post('asset-locations/parse-csv-import', [AssetLocationController::class ,'parseCsvImport'])->name('asset-locations.parseCsvImport');
    Route::post('asset-locations/process-csv-import', [AssetLocationController::class ,'processCsvImport'])->name('asset-locations.processCsvImport');
    Route::resource('asset-locations', AssetLocationController::class);

    // Asset Status
    Route::delete('asset-statuses/destroy', [AssetStatusController::class ,'massDestroy'])->name('asset-statuses.massDestroy');
    Route::post('asset-statuses/parse-csv-import', [AssetStatusController::class ,'parseCsvImport'])->name('asset-statuses.parseCsvImport');
    Route::post('asset-statuses/process-csv-import', [AssetStatusController::class ,'processCsvImport'])->name('asset-statuses.processCsvImport');
    Route::resource('asset-statuses', AssetStatusController::class);

    // Asset
    Route::delete('assets/destroy', [AssetController::class ,'massDestroy'])->name('assets.massDestroy');
    Route::post('assets/media', [AssetController::class, 'storeMedia'])->name('assets.storeMedia');
    Route::post('assets/ckmedia', [AssetController::class,'storeCKEditorImages'])->name('assets.storeCKEditorImages');
    Route::post('assets/parse-csv-import', [AssetController::class ,'parseCsvImport'])->name('assets.parseCsvImport');
    Route::post('assets/process-csv-import', [AssetController::class ,'processCsvImport'])->name('assets.processCsvImport');
    Route::get('/download-qr-code/{asset}', [AssetController::class, 'downloadQRCode'])->name('download-qr-code');
    Route::resource('assets', AssetController::class);

    // Assets History
    Route::resource('assets-histories', AssetsHistoryController::class , ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Pengajuan
    Route::delete('pengajuans/destroy', [PengajuanController::class ,'massDestroy'])->name('pengajuans.massDestroy');
    Route::post('pengajuans/parse-csv-import', [PengajuanController::class ,'parseCsvImport'])->name('pengajuans.parseCsvImport');
    Route::post('pengajuans/process-csv-import', [PengajuanController::class ,'processCsvImport'])->name('pengajuans.processCsvImport');
    Route::resource('pengajuans', PengajuanController::class);

});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', [ChangePasswordController::class ,'edit'])->name('password.edit');
        Route::post('password', [ChangePasswordController::class ,'update'])->name('password.update');
        Route::post('profile', [ChangePasswordController::class ,'updateProfile'])->name('password.updateProfile');
        Route::post('profile/destroy', [ChangePasswordController::class ,'destroy'])->name('password.destroyProfile');
    }
});