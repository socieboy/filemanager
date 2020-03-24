<?php

use Socieboy\FileManager\Http\Controllers\FileManagerController;

Route::get('', FileManagerController::class.'@index');
Route::post('', FileManagerController::class.'@store');
Route::get('preview', FileManagerController::class.'@show');
