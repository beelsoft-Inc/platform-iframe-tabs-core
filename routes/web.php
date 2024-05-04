<?php

use Tungnt\IframeTabs\Http\Controllers\IframeTabsController;
use Tungnt\IframeTabs\IframeTabs;

use Tungnt\Admin\Controllers\AuthController;

Route::get('/', IframeTabsController::class . '@index')->name('iframes.index');

Route::get('/dashboard', IframeTabs::config('home_action', IframeTabsController::class . '@dashboard'))->name('iframes.dashboard');

if (IframeTabs::config('force_login_in_top', true)) {

    $middleware = config('admin.route.middleware', []);

    array_push($middleware, 'iframe.login');

    $authController = config('admin.auth.controller', AuthController::class);

    Route::get('auth/login', $authController . '@getLogin')->middleware($middleware);
}
