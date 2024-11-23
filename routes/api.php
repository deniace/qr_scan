<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\ScanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("salam", function () {
    return response()->json([
        "status" => "success",
        "message" => "Salam dari dunia",
    ]);
});


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get("scan", [ScanController::class, "index"]);

    Route::get("scan/{id}", [ScanController::class, "show"]);

    Route::post("scan", [ScanController::class, "store"]);

    Route::put("scan/{id}", [ScanController::class, "update"]);

    Route::delete("scan/{id}", [ScanController::class, "destroy"]);

    Route::post("scan_qr", [ScanController::class, "scan_qr"]);

    Route::post("report", [ReportController::class, "index"]);
});
