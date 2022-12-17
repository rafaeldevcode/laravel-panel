<?php

use App\Http\Controllers\{
    UsersControllers,
    DashboardControllers,
    AuthControllers,
    GalleryControllers,
    LogsControllers,
    MenusControllers,
    NotificationsControllers,
    PermissionsControllers,
    PoliciesCotrollers,
    ProfileControllers,
    SettingsControllers};
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

Route::get('/login', [AuthControllers::class, 'index']);
Route::post('/login', [AuthControllers::class, 'login']);
Route::post('/logout', [AuthControllers::class, 'logout']);
Route::get('/register', [AuthControllers::class, 'create'])->middleware('auth');
Route::post('/register', [AuthControllers::class, 'store'])->middleware('auth');
Route::get('/reset-password', [AuthControllers::class, 'resetPassword']);
Route::get('/verify-email', [AuthControllers::class, 'verifyEmail']);

// Grupos de rotas para administradores
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', function(){
        return redirect()->back();
    });
    Route::get('/dashboard', [DashboardControllers::class, 'index']);

    // Grupo de rotas para as permições
    Route::get('/permissions', [PermissionsControllers::class, 'index']);
    Route::post('/permissions/add', [PermissionsControllers::class, 'store']);
    Route::get('/permissions/add', [PermissionsControllers::class, 'create']);
    Route::post('/permissions/delete/{ID}', [PermissionsControllers::class, 'delete']);
    Route::post('/delete/several/permissions', [PermissionsControllers::class, 'deleteSeveral']);
    Route::get('/permissions/edit/{ID}', [PermissionsControllers::class, 'update']);
    Route::post('/permissions/edit/{ID}', [PermissionsControllers::class, 'updateStore']);

    // Grupo de rotas para os menus
    Route::get('/menus', [MenusControllers::class, 'index']);
    Route::post('/menus/add', [MenusControllers::class, 'store']);
    Route::get('/menus/add', [MenusControllers::class, 'create']);
    Route::post('/menus/delete/{ID}', [MenusControllers::class, 'delete']);
    Route::post('/delete/several/menus', [MenusControllers::class, 'deleteSeveral']);
    Route::get('/menus/edit/{ID}', [MenusControllers::class, 'update']);
    Route::post('/menus/edit/{ID}', [MenusControllers::class, 'updateStore']);

    // Grupo de rotas para os usuários
    Route::get('/users', [UsersControllers::class, 'index']);
    Route::post('/users/add', [UsersControllers::class, 'store']);
    Route::get('/users/add', [UsersControllers::class, 'create']);
    Route::post('/users/delete/{ID}', [UsersControllers::class, 'delete']);
    Route::post('/delete/several/users', [UsersControllers::class, 'deleteSeveral']);
    Route::get('/users/edit/{ID}', [UsersControllers::class, 'update']);
    Route::post('/users/edit/{ID}', [UsersControllers::class, 'updateStore']);

    // Grupo de rotas para os notificações
    Route::get('/notifications', [NotificationsControllers::class, 'index']);
    Route::post('/notifications/add', [NotificationsControllers::class, 'store']);
    Route::get('/notifications/add', [NotificationsControllers::class, 'create']);
    Route::post('/notifications/delete/{ID}', [NotificationsControllers::class, 'delete']);
    Route::post('/delete/several/notifications', [NotificationsControllers::class, 'deleteSeveral']);
    Route::get('/notifications/edit/{ID}', [NotificationsControllers::class, 'update']);
    Route::post('/notifications/edit/{ID}', [NotificationsControllers::class, 'updateStore']);
    Route::post('/notifications/{ID}/view', [NotificationsControllers::class, 'view']);
    Route::post('/notifications/view', [NotificationsControllers::class, 'viewSeveral']);

    // Grupo de rotas para as configurações da página
    Route::get('/settings/edit', [SettingsControllers::class, 'create']);
    Route::post('/settings/edit', [SettingsControllers::class, 'store']);

    // Grupo de rotas para as configuração do perfil
    Route::post('/profile/edit', [ProfileControllers::class, 'store']);
    Route::get('/profile/edit', [ProfileControllers::class, 'index']);
    Route::post('/profile/image/edit', [ProfileControllers::class, 'updateAvatar']);

    // Grupo de rotas exibir arquivos de logs
    Route::get('/logs', [LogsControllers::class, 'index']);
    Route::post('/logs/clear', [LogsControllers::class, 'clear']);

    // Gupo de rotas para galeria
    Route::get('/gallery', [GalleryControllers::class, 'index']);
    Route::post('/gallery/upload', [GalleryControllers::class, 'upload']);
    Route::post('/gallery/create/folder', [GalleryControllers::class, 'storeFolder']);
    Route::post('/gallery/image/dowload', [GalleryControllers::class, 'fileDowload']);
    Route::post('/gallery/image/remove', [GalleryControllers::class, 'fileRemove']);
    Route::post('/gallery/folder/remove', [GalleryControllers::class, 'folderRemove']);
});

// Grupo de rotas para políticas e termos
Route::group(['prefix' => 'policies'], function(){
    Route::get('/privacy', [PoliciesCotrollers::class, 'privacy']);
    Route::get('/terms', [PoliciesCotrollers::class, 'terms']);
});
