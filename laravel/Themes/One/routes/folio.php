<?php
declare(strict_types=1);
use Laravel\Folio\Folio;
use Illuminate\Support\Facades\Route;

Folio::path(resource_path('views/pages'))->middleware([
    'web',
    'auth',
])->uri('/');

// Gestione specifica per la pagina di logout
Route::get('/auth/logout', function () {
    return view('pages.auth.logout');
})->middleware(['web', 'auth'])->name('auth.logout');
