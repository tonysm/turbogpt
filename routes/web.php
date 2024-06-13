<?php

use App\Http\Controllers\ChatMessagesController;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'chats.create')->name('home');

    Route::resource('chats', ChatsController::class);
    Route::resource('chats.messages', ChatMessagesController::class)->only(['store']);
});
