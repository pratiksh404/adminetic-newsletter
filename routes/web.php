<?php

use Adminetic\Newsletter\Http\Controllers\Admin\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::get('unsubscribe/{uuid}', [SubscriberController::class, 'unsubscribe'])->name('unsubscribe');
Route::get('verify/{uuid}', [SubscriberController::class, 'verify'])->name('verify');
