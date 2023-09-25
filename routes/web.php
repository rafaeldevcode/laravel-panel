<?php

use App\Http\Controllers\{
    UsersController,
    DashboardController,
    AuthController,
    MenusController,
    PermissionsController,
    PoliciesCotroller,
    ProfileController,
    SettingsController};
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
    return redirect()->route('dashboard');
});

Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
// Route::get('/register', [AuthController::class, 'create'])->name('register.create')->middleware('auth');
// Route::post('/register', [AuthController::class, 'store'])->name('register.store')->middleware('auth');
Route::get('/reset-password', [AuthController::class, 'resetPassword'])->name('reset.pass');
Route::get('/verify-email', [AuthController::class, 'verifyEmail'])->name('verify.email');

// Route groups for administrators
Route::group(['prefix' => 'admin'], function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', function(){
        return redirect()->back();
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route group for permissions
    Route::get('/permissions', [PermissionsController::class, 'index'])->name('permissions.index');
    Route::post('/permissions/create', [PermissionsController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/create', [PermissionsController::class, 'create'])->name('permissions.create');
    Route::post('/permissions/delete', [PermissionsController::class, 'destroy'])->name('permissions.destroy');
    Route::get('/permissions/edit/{ID}', [PermissionsController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions/edit/{ID}', [PermissionsController::class, 'update'])->name('permissions.update');

    // Route group for menus
    Route::get('/menus', [MenusController::class, 'index'])->name('menus.index');
    Route::post('/menus/create', [MenusController::class, 'store'])->name('menus.store');
    Route::get('/menus/create', [MenusController::class, 'create'])->name('menus.create');
    Route::post('/menus/delete', [MenusController::class, 'destroy'])->name('menus.destroy');
    Route::get('/menus/edit/{ID}', [MenusController::class, 'edit'])->name('menus.edit');
    Route::post('/menus/edit/{ID}', [MenusController::class, 'update'])->name('menus.update');

    // Group of routes for users
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::post('/users/create', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users/delete', [UsersController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/edit/{ID}', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('/users/edit/{ID}', [UsersController::class, 'update'])->name('users.update');

    // Route group for page settings
    Route::get('/settings/edit', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::post('/settings/edit', [SettingsController::class, 'update'])->name('settings.update');

    // Route group for profile configurations
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/image/edit', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');
});

// Route group for policies and terms
Route::group(['prefix' => 'policies'], function(){
    Route::get('/privacy', [PoliciesCotroller::class, 'privacy'])->name('privacy');
    Route::get('/terms', [PoliciesCotroller::class, 'terms'])->name('terms');
});
