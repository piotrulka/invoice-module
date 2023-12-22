<?php

declare(strict_types=1);

use App\Infrastructure\Controllers\InvoiceApprovalController;
use App\Infrastructure\Controllers\InvoiceController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/invoices', [InvoiceController::class,'index']);

Route::get('/invoice/{id}', [InvoiceController::class,'show']);

Route::post('/invoice/{id}/accept', [InvoiceApprovalController::class,'accept']);

Route::post('/invoice/{id}/reject', [InvoiceApprovalController::class,'reject']);
