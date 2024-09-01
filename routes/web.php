<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\TokenRepository;
use App\Http\Controllers\ProfileController;
use Laravel\Passport\RefreshTokenRepository;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/dashboard/clients', function (Request $request) {
    return view('clients', [
        'clients' => $request->user()->clients
    ]);
})->middleware(['auth', 'verified'])->name('dashboard.clients');

Route::post('oauth/revoke', function (Request $request, TokenRepository $tokenRepository, RefreshTokenRepository $refreshTokenRepository) {
    

    $token = $request->input('token');

    dd('request coming');
    // $token = $request->input('token');
    // $tokenTypeHint = $request->input('token_type_hint');

    // if ($tokenTypeHint == 'access_token') {
    //     $tokenId = (new \Lcobucci\JWT\Parser())->parse($token)->getClaim('jti');
    //     $tokenRepository->revokeAccessToken($tokenId);
    // } elseif ($tokenTypeHint == 'refresh_token') {
    //     $refreshTokenRepository->revokeRefreshToken($token);
    // }

    return response()->json([
        'message' => 'Token revoked successfully.'
    ]);
});


