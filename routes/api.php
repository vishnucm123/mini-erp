<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ManageController;

Route::match(['get', 'post'], '/manage/{model}', [ManageController::class, 'handleRequest']);
