<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('/admin');
});

require __DIR__.'/admin.php';
require __DIR__.'/frontend.php';

