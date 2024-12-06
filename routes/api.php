<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersAppController;
use App\Http\Controllers\ExercisesCategoriesController;
use App\Http\Controllers\ExercisesController;
use App\Http\Controllers\RoutinesController;
use App\Http\Controllers\RoutineDetailsController;


Route::resource('/users', UsersAppController::class);
Route::resource('/categories', ExercisesCategoriesController::class);
Route::resource('/exercises', ExercisesController::class);
Route::resource('/routines', RoutinesController::class);
Route::resource('/details', RoutineDetailsController::class);


Route::post('/categories/all', [ExercisesCategoriesController::class, 'storeAll']);