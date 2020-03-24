<?php

use Socieboy\FileManager\Http\Controllers\FileManagerController;
use \Socieboy\FileManager\Http\Controllers\FileController;

Route::get('', FileManagerController::class.'@index');
Route::post('', FileManagerController::class.'@store');

// Files
Route::delete('remove', FileController::class.'@destroy');
Route::post('copy', FileController::class.'@copy');
Route::get('preview', FileController::class.'@show');
