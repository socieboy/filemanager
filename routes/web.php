<?php

Route::get('', FileManagerController::class.'@index');

// Folders
Route::get('directory', DirectoryController::class.'@index');
Route::post('directory', DirectoryController::class.'@store');
Route::patch('directory', DirectoryController::class.'@update');
Route::delete('directory', DirectoryController::class.'@destroy');

// Files
Route::post('file', FileController::class.'@store');
Route::post('file/copy', FileController::class.'@copy');
Route::get('file', FileController::class.'@show');
Route::delete('file', FileController::class.'@destroy');
