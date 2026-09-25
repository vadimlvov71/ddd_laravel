<?php

declare(strict_types=1);

use App\Presentation\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Route;

/**
 * Contract management endpoints.
 */
Route::post('/contracts', [ContractController::class, 'store']);