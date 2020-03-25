<?php

Route::get('', FileManagerController::class.'@index');
Route::post('', FileManagerController::class.'@store');

// Folders
Route::post('directories', DirectoryController::class.'@store');
Route::patch('directories', DirectoryController::class.'@update');
Route::delete('directories', DirectoryController::class.'@destroy');

// Files
Route::delete('remove', FileController::class.'@destroy');
Route::post('copy', FileController::class.'@copy');
Route::get('preview', FileController::class.'@show');
