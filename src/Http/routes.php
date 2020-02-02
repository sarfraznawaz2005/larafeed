<?php

use Illuminate\Support\Facades\Route;
use Sarfraznawaz2005\LaraFeed\Http\Controllers\LaraFeedController;

Route::post('store', '\\' . LaraFeedController::class)->name('larafeed_store');
