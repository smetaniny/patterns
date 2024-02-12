<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Nova\Nova;


Route::middleware(config('nova.middleware', []))
    ->get('/test', function () {
        return Inertia::render('Nova.Dashboard', [
        ]);
    });


