<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Endpoint publik sederhana untuk menguji koneksi
Route::get('/v1/status', function (Request $request) {
  return response()->json([
    'api_status' => 'online',
    'app_version' => '1.0.0',
    'tenant_schema' => config('database.default') === 'pgsql' ? \DB::connection('pgsql')->getConfig('search_path') : 'n/a'
  ]);
});

// Endpoint yang membutuhkan autentikasi (untuk diuji nanti)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});
