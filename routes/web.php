<?php

use Illuminate\Support\Facades\Route;


Route::view('{any}', 'web/index')->where('any', '^(?!dashboard|api).*');

Route::view('dashboard{any}', 'dashboard/index')->where('any', '^(?!api).*');