<?php

use App\Http\Controllers\{
    UsersController,
    DashboardController,
    AuthController,
    GalleryController,
    LogsController,
    MenusController,
    NotificationsController,
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
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'create'])->middleware('auth');
Route::post('/register', [AuthController::class, 'store'])->middleware('auth');
Route::get('/reset-password', [AuthController::class, 'resetPassword']);
Route::get('/verify-email', [AuthController::class, 'verifyEmail']);

// Grupos de rotas para administradores
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', function(){
        return redirect()->back();
    });
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Grupo de rotas para as permições
    Route::get('/permissions', [PermissionsController::class, 'index']);
    Route::post('/permissions/add', [PermissionsController::class, 'store']);
    Route::get('/permissions/add', [PermissionsController::class, 'create']);
    Route::post('/permissions/delete/{ID}', [PermissionsController::class, 'destroy']);
    Route::post('/delete/several/permissions', [PermissionsController::class, 'destroySeveral']);
    Route::get('/permissions/edit/{ID}', [PermissionsController::class, 'edit']);
    Route::post('/permissions/edit/{ID}', [PermissionsController::class, 'update']);

    // Grupo de rotas para os menus
    Route::get('/menus', [MenusController::class, 'index']);
    Route::post('/menus/add', [MenusController::class, 'store']);
    Route::get('/menus/add', [MenusController::class, 'create']);
    Route::post('/menus/delete/{ID}', [MenusController::class, 'destroy']);
    Route::post('/delete/several/menus', [MenusController::class, 'destroySeveral']);
    Route::get('/menus/edit/{ID}', [MenusController::class, 'edit']);
    Route::post('/menus/edit/{ID}', [MenusController::class, 'update']);

    // Grupo de rotas para os usuários
    Route::get('/users', [UsersController::class, 'index']);
    Route::post('/users/add', [UsersController::class, 'store']);
    Route::get('/users/add', [UsersController::class, 'create']);
    Route::post('/users/delete/{ID}', [UsersController::class, 'destroy']);
    Route::post('/delete/several/users', [UsersController::class, 'destroySeveral']);
    Route::get('/users/edit/{ID}', [UsersController::class, 'edit']);
    Route::post('/users/edit/{ID}', [UsersController::class, 'update']);

    // Grupo de rotas para os notificações
    Route::get('/notifications', [NotificationsController::class, 'index']);
    Route::post('/notifications/add', [NotificationsController::class, 'store']);
    Route::get('/notifications/add', [NotificationsController::class, 'create']);
    Route::post('/notifications/delete/{ID}', [NotificationsController::class, 'destroy']);
    Route::post('/delete/several/notifications', [NotificationsController::class, 'destroySeveral']);
    Route::get('/notifications/edit/{ID}', [NotificationsController::class, 'edit']);
    Route::post('/notifications/edit/{ID}', [NotificationsController::class, 'update']);
    Route::post('/notifications/{ID}/view', [NotificationsController::class, 'view']);
    Route::post('/notifications/view', [NotificationsController::class, 'viewSeveral']);

    // Grupo de rotas para as configurações da página
    Route::get('/settings/edit', [SettingsController::class, 'edit']);
    Route::post('/settings/edit', [SettingsController::class, 'update']);

    // Grupo de rotas para as configuração do perfil
    Route::post('/profile/edit', [ProfileController::class, 'update']);
    Route::get('/profile/edit', [ProfileController::class, 'edit']);
    Route::post('/profile/image/edit', [ProfileController::class, 'updateAvatar']);

    // Grupo de rotas exibir arquivos de logs
    Route::get('/logs', [LogsController::class, 'index']);
    Route::post('/logs/clear', [LogsController::class, 'clear']);

    // Gupo de rotas para galeria
    Route::get('/gallery', [GalleryController::class, 'index']);
    Route::post('/gallery/upload', [GalleryController::class, 'upload']);
    Route::post('/gallery/create/folder', [GalleryController::class, 'storeFolder']);
    Route::post('/gallery/image/dowload', [GalleryController::class, 'dowloadFile']);
    Route::post('/gallery/image/remove', [GalleryController::class, 'destroyFile']);
    Route::post('/gallery/folder/remove', [GalleryController::class, 'destroyFolder']);
});

// Grupo de rotas para políticas e termos
Route::group(['prefix' => 'policies'], function(){
    Route::get('/privacy', [PoliciesCotroller::class, 'indexPrivacy']);
    Route::get('/terms', [PoliciesCotroller::class, 'indexTerms']);
});
