<?php

use Illuminate\Support\Facades\Route;
use Adminetic\Newsletter\Http\Controllers\Admin\SubscriberController;

Route::get('unsubscribe/{subscriber:uuid}', [SubscriberController::class, 'unsubscribe'])->name('unsubscribe');
Route::get('verify/{subscriber:uuid}', [SubscriberController::class, 'verify'])->name('verify');
