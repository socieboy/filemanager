<?php

use Socieboy\FileManager\Http\Controllers\FileManagerController;

Route::get('', FileManagerController::class.'@index');
Route::get('preview', FileManagerController::class.'@show');
