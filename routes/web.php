<?php

use Adminetic\Newsletter\Http\Controllers\Admin\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::get('unsubscribe/{subscriber:uuid}', [SubscriberController::class, 'unsubscribe'])->name('unsubscribe');
Route::get('verify/{subscriber:uuid}', [SubscriberController::class, 'verify'])->name('verify');
