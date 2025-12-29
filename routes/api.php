<?php

use App\Http\Controllers\IncidentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('incidents', IncidentController::class);