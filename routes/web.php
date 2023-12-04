<?php

use App\Http\Controllers\ArchiveController;
use App\Models\Note;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PinController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthenticatedMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function() {
    return view('welcome');
});

Route::middleware([AuthenticatedMiddleware::class])->group(function () {
    Route::get('/', [NoteController::class, 'index']);
    Route::get('/profile', [SettingController::class, 'index']);
    Route::post('/{user}/profile', [UserController::class, 'edit']);
    Route::get('/account-deletion/{user}', [SettingController::class, 'deleteForm']);
    Route::post('/account-deletion/{user}', [UserController::class, 'destroy']);
    Route::get('/trash', [NoteController::class, 'trash']);
    Route::get('/notes/create', [NoteController::class, 'create']);
    Route::post('/notes/create', [NoteController::class, 'store']);
    Route::get('/notes/{note}/edit', [NoteController::class, 'edit']);
    Route::post('/notes/{note}/update', [NoteController::class, 'update']);
    Route::post('/notes/{note}/pin', [PinController::class, 'handlePin']);
    Route::delete('/notes/{note}/move_to_trash', [NoteController::class, 'moveToTrash']);
    Route::post('/trash/{note}/restore', [NoteController::class, 'restore']);
    Route::delete('/trash/{note}/delete', [NoteController::class, 'delete']);
});

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerStore']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginStore']);
Route::post('/logout', [AuthController::class, 'logout']);
