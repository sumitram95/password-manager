<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\DashBaordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\Password\UrlPasswordManagerController;
use App\Http\Controllers\PasswordManagerController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\Backend\Action\UrlActionController;
use App\Http\Controllers\Backend\Action\UserAcrionController;
use App\Http\Controllers\AbcController;

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

//-- Auth
Route::get('/register', [UserController::class, 'index'])->name('register.index');
Route::post('/register', [UserController::class, 'store'])->name('register.post');

Route::get('/', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'loginIndex'])->name('login.index');
Route::post('/login-check', [AuthController::class, 'loginCheck'])->name('login');


//---- Auth Middleware
Route::middleware(['auth'])->group(function () {

    //---- DashBoard Controller
    Route::controller(DashBaordController::class)->group(function () {

        Route::get('/dashboard', 'showDashBoardIndex')->name('dashboard.index');
        Route::get('/dashboard/password', 'showDashBoardIndex')->name('dashboard.password');
        Route::post('/dashboard/password', 'urlPasswordCreate')->name('url.password.create');

    });


    Route::group(['middleware' => ['role:Admin']], function () {

        //------- Admin Controller
        Route::controller(AdminController::class)->group(function () {

            //------- new user create by Admin
            Route::get('/user-lists/create', 'createUserIndex')->name('create.user.index');
            Route::post('/create-user', 'createIndexPost')->name('create.new.user');

            //--------------- user data edit or update by admin
            Route::get('/user/edit/{user_id}', 'userEdit')->name('user.edit');
            Route::put('/user/edit/{user_id}', 'userDataUpdate')->name('user.edit.save');

            //--------------- user data view by admin
            Route::get('/user-lists', 'viewUserLists')->name('show.user.lists');
            Route::get('/view-user-data/{user_id}', 'viewUserSingleData')->name('show.user.single.data');

            //------------ admin can delete user
            Route::get('/user/delete/{user_id}', 'deleteUserAccount')->name('delete.user.account');

        });
    });

    //-------- Single Url detail show
    Route::get('/dashboard/password/{url_id}', [UrlPasswordManagerController::class, 'urlPasswordShow'])->name('url.password.show');

    //------ Url Action
    Route::put('/dashboar/url/update/{url_id}', [UrlActionController::class, 'urlUpdate'])->name('url.update');
    Route::get('/url/delete/{url_id}', [UrlActionController::class, 'urlIdDelete'])->name('url.id.delete');


    Route::get('user-permission-change/{user_id}', [UserAcrionController::class, 'userPermissionChanger'])->name('permission.change');

    //-- Password Route
    Route::get('/password', [PasswordManagerController::class, 'Password'])->name('password');
    Route::post('/password', [PasswordManagerController::class, 'PasswordPost']);
    Route::get('/url-password-show/{id}', [PasswordManagerController::class, 'UrlShow']);

    Route::get('/add-password', [PasswordManagerController::class, 'AddNewPassword']);


    //****************** LogOut  ************************** */
    Route::get('/logout', [RegisterController::class, 'LogOut']);
});


Route::resource('products', AbcController::class);
