<?php

use Illuminate\Support\Facades\Route;
use Adminetic\Newsletter\Http\Controllers\Admin\SubscriberController;

Route::get('unsubscribe/{email}', [SubscriberController::class, 'unsubscribe'])->name('unsubscribe');
