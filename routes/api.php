<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ProfileTool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::get('/', \Runline\ProfileTool\Http\Controllers\ToolController::class . '@index');
Route::post('/', \Runline\ProfileTool\Http\Controllers\ToolController::class . '@store');
