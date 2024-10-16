<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Admin\MunicipalityController;
use App\Models\User;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\StorageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/forgot-password', function () {
    return view('auth.forgot-password.forgot-password');
})->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'SendPassResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'ShowResetForm'])->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'Reset'])->name('password.update');

Route::get('/register', [AuthController::class, 'ShowRegistrationForm'])->name('register.show');
Route::post('/store-account', [AuthController::class, 'StoreAccount'])->name('user.post');
Route::get('/login', [AuthController::class, 'ShowLogin'])->name('login.show');
Route::post('/login/auth', [AuthController::class, 'Authenticate'])->name('login.post');
Route::get('/verify', [AuthController::class, 'ShowVerification'])->name('verification.show');
Route::post('/verify/account', [AuthController::class, 'VerifyEmail'])->name('verify.email.post');
Route::post('/logout', [AuthController::class, 'Logout'])->name('logout.post');

Route::middleware(['authentication'])->group(function () {
    Route::get('/staff', [AdminController::class, 'ShowHome'])->name('admin.home.show');
    Route::get('/admin/storage-usage', [StorageController::class, 'GetStorageUsage'])->name('admin.storage.usage');

    Route::get('/admin/municipality/{type}', [MunicipalityController::class, 'ShowMunicipality'])->name('municipality.show');
    Route::get('/admin/file-manager', [AdminController::class, 'ShowFileManager'])->name('file-manager.show');
    Route::get('/admin/{type}/municipality', [AdminController::class, 'ShowMunicipality'])->name('file-manager.municipality.show');
    Route::get('/admin/{type}/categories', [AdminController::class, 'ShowLandTitlesOrPatentedLots'])->name('file-manager.land-title.show');
    Route::get('/admin/{type}/{category}/municipality', [AdminController::class, 'ShowMunicipalityWithCategory'])->name('file-manager.municipality.with-category.show');
    Route::get('/admin/{type}/{municipality}', [AdminController::class, 'ShowTable'])->name('file-manager.table.show');
    Route::get('/admin/{type}/{category}/{municipality}', [AdminController::class, 'ShowTableWithCategory'])->name('file-manager.table.with-category.show');

    Route::get("/admin/administrative-document", [AdminController::class, "ShowAdministrativeDocuments"]);
    // Route::get("/admin/adminstrative-document")


    Route::post('/file-upload', [FileController::class, 'StoreFile'])->name('file.post');
    Route::post('/permit-upload', [FileController::class, 'StorePermit'])->name('permit.post');

    Route::get("/api/files/{type}/{municipality}", [FileController::class, 'GetFiles'])->name('file.getAll');
    //for view
    Route::get("/api/files/{id}", [FileController::class, "GetFileById"])->name("file.get");
    Route::get('/download/{id}', [FileController::class, 'Download'])->name('file.download');
    // for update
    //Route::put()
    //post for movoe


    Route::post('/file-upload/test', [FileController::class, 'Upload'])->name('file.upload');

    Route::get("/superuser/test", function () {
        return view("superuser.test");
    });


    Route::get('/recent-uploads', [StorageController::class, 'getRecentUploads']);
});

