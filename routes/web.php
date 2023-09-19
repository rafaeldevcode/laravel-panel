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
    return redirect('/admin/dashboard');
});

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'create'])->middleware('auth');
Route::post('/register', [AuthController::class, 'store'])->middleware('auth');
Route::get('/reset-password', [AuthController::class, 'resetPassword']);
Route::get('/verify-email', [AuthController::class, 'verifyEmail']);

// Grupos de rotas para administradores
Route::group(['prefix' => 'admin'], function(){
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/', function(){
        return redirect()->back();
    });
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Grupo de rotas para as permições
    Route::get('/permissions', [PermissionsController::class, 'index']);
    Route::post('/permissions/create', [PermissionsController::class, 'store']);
    Route::get('/permissions/create', [PermissionsController::class, 'create']);
    Route::post('/permissions/delete/{ID}', [PermissionsController::class, 'destroy']);
    Route::post('/delete/several/permissions', [PermissionsController::class, 'destroySeveral']);
    Route::get('/permissions/edit/{ID}', [PermissionsController::class, 'edit']);
    Route::post('/permissions/edit/{ID}', [PermissionsController::class, 'update']);

    // Grupo de rotas para os menus
    Route::get('/menus', [MenusController::class, 'index']);
    Route::post('/menus/create', [MenusController::class, 'store']);
    Route::get('/menus/create', [MenusController::class, 'create']);
    Route::post('/menus/delete/{ID}', [MenusController::class, 'destroy']);
    Route::post('/delete/several/menus', [MenusController::class, 'destroySeveral']);
    Route::get('/menus/edit/{ID}', [MenusController::class, 'edit']);
    Route::post('/menus/edit/{ID}', [MenusController::class, 'update']);

    // Grupo de rotas para os usuários
    Route::get('/users', [UsersController::class, 'index']);
    Route::post('/users/create', [UsersController::class, 'store']);
    Route::get('/users/create', [UsersController::class, 'create']);
    Route::post('/users/delete/{ID}', [UsersController::class, 'destroy']);
    Route::post('/delete/several/users', [UsersController::class, 'destroySeveral']);
    Route::get('/users/edit/{ID}', [UsersController::class, 'edit']);
    Route::post('/users/edit/{ID}', [UsersController::class, 'update']);

    // Grupo de rotas para as configurações da página
    Route::get('/settings/edit', [SettingsController::class, 'edit']);
    Route::post('/settings/edit', [SettingsController::class, 'update']);

    // Grupo de rotas para as configuração do perfil
    Route::post('/profile', [ProfileController::class, 'update']);
    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::post('/profile/image/edit', [ProfileController::class, 'updateAvatar']);
});

// Grupo de rotas para políticas e termos
Route::group(['prefix' => 'policies'], function(){
    Route::get('/privacy', [PoliciesCotroller::class, 'indexPrivacy']);
    Route::get('/terms', [PoliciesCotroller::class, 'indexTerms']);
});
