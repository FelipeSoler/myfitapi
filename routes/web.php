<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersAppController;

Route::get('/', function () {
    return view('welcome');
});
