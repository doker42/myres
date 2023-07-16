<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AvatarController;
use App\Http\Controllers\Admin\EmploymentController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\LetterController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\VisitorController;
use Illuminate\Support\Facades\Route;



//Route::middleware('auth')->group(function () {

    Route::group(['prefix' =>  'admin' ], function () {

        Route::get('/', [AdminController::class, 'index'])->name('admin');

        Route::controller(EmploymentController::class)->group(function () {
            Route::group(['prefix' => 'employments'], function(){
                Route::get('/', 'index')->name('jobs');
                Route::get('/create', 'create')->name('create_job');
                Route::get('/edit/{id}', 'edit')->name('edit_job');
                Route::post('/update/{id}', 'update')->name('update_job');
                Route::post('/destroy/{id}', 'destroy')->name('destroy_job');
                Route::post('/store', 'store')->name('store_job');
            });
        });

        Route::controller(AvatarController::class)->group(function () {
            Route::group(['prefix' => 'avatars'], function(){
                Route::get('/', 'index')->name('avatars');
                Route::post('/store', 'store')->name('store_avatar');
//                Route::get('/update/{avatar}', 'update')->name('update_avatar');
                Route::get('/update/{id}', 'update')->name('update_avatar');
//                Route::post('/destroy/{avatar}', 'destroy')->name('destroy_avatar');
                Route::post('/destroy/{id}', 'destroy')->name('destroy_avatar');
                Route::get('/avacheck', 'avacheck')->name('avacheck');
            });
        });

        Route::controller(ImageController::class)->group(function () {
            Route::group(['prefix' => 'images'], function(){
                Route::get('/', 'index')->name('images');
                Route::post('/store', 'store')->name('store_image');
                Route::get('/update/{image}', 'update')->name('update_image');
            });
        });

        Route::controller(LetterController::class)->group(function () {
            Route::group(['prefix' => 'letters'], function(){
                Route::get('/', 'LetterController@index')->name('letters');
                Route::post('/store', 'LetterController@store')->name('store_letter');
                Route::get('/update/{letter}', 'LetterController@update')->name('update_letter');
                Route::post('/destroy/{id}', 'LetterController@destroy')->name('destroy_letter');
            });
        });

        Route::controller(AboutController::class)->group(function () {
            Route::group(['prefix' => 'about'], function(){
                Route::get('/', 'index')->name('about');
                Route::get('/edit/{id}', 'edit')->name('edit_about');
                Route::post('/update/{id}', 'update')->name('update_about');
                Route::post('/update_status', 'updatestatus')->name('update_about_status');
            });
        });

        Route::controller(ProjectController::class)->group(function () {
            Route::group(['prefix' => 'projects'], function(){
                Route::get('/', 'index')->name('projects');
                Route::get('/create', 'create')->name('create_project');
                Route::post('/store', 'store')->name('store_project');
                Route::get('/show/{id}', 'show')->name('show_project');
                Route::get('/edit/{id}', 'edit')->name('edit_project');
                Route::post('/update/{id}', 'update')->name('update_project');
                Route::post('/update_status', 'updatestatus')->name('update_project_status');
                Route::post('/destroy_project/{id}', 'destroy')->name('destroy_project');
            });
        });

        Route::controller(VisitorController::class)->group(function () {
            Route::group(['prefix' => 'visitors'], function () {
                Route::get('/', 'index')->name('visitors');
            });
        });

    });
//});




