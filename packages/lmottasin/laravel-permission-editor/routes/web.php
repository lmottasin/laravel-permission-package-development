<?php

use Illuminate\Support\Facades\Route;
use Lmottasin\LaravelPermissionEditor\Http\Controllers\RoleController;

Route::resource('roles', RoleController::class);
