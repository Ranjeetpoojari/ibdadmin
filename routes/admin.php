<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

Route::get('/login', [AuthController::class, 'signin'])->name('login');

Route::post("/authentication", [AuthController::class,'login']);

Route::get("/logout", [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    });

});
// Route::get('admin',[AuthController::class ,'admin']);