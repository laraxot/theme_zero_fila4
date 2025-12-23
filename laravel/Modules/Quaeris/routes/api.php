<?php
declare(strict_types=1);
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/quaeris', fn (Request $request) => $request->user());

Route::prefix('/quaeris')
    ->namespace('Api')
    ->group(
        static function (): void {
            Route::middleware('auth:api')
                ->post('/add-contact', 'AddContactController')
                ->name('api.contact.add');
            Route::middleware('auth:api')
                ->post('/add-contact-multi', 'AddContactMultiController')
                ->name('api.contact.add-multi');
            //Route::middleware('auth:api')
            //    ->post('/add-multiple-contact', 'AddMultipleContactController')
            //    ->name('api.contact.add.multiple');
        }
    );
