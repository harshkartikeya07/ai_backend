<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AiToolController;


 
 
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/users', [UserController::class, 'index']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/ai-tools', [AiToolController::class, 'index']); // Fetch all records
Route::get('/ai-tools/{id}', [AiToolController::class, 'getAiToolById']); // Fetch all records
Route::get('/ai-tools/category/{categoryId}', [AiToolController::class, 'getByCategory']); // Fetch based on category

Route::put('/ai-tools/update/{id}', [AiToolController::class, 'updateTool']);
Route::put('/ai-tools/update/{id}', [AiToolController::class, 'updateCategory']);

Route::delete('/ai-tools/tool/delete', [AiToolsController::class, 'deleteTool']);
Route::delete('/ai-tools/category/delete', [AiToolsController::class, 'deleteCategory']);
