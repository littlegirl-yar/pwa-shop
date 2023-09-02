<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CartItemController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::post('/auth/register', [RegisterController::class, 'register']);
Route::post('/auth/token', [LoginController::class, 'token']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/auth/logout', [LoginController::class, 'logout']);
    Route::get('me', [UserController::class, 'me']);
    Route::get('cartitems',[CartItemController::class,'index']);
    Route::post('cartitems',[CartItemController::class,'store']);
    Route::delete('cartitems/{cartitem}',[CartItemController::class,'destroy']);
    Route::get('categories',[CategoryController::class, 'index']);
    Route::get('categories/{category}/products',[ProductController::class, 'index']);
    Route::get('products/{product}',[ProductController::class, 'show']);
    Route::get('posts',[PostController::class, 'index']);
    Route::get('posts/{post}',[PostController::class, 'show']);
});

Route::post('/{provider}/callback', function ($provider) {

    $providerUser  = Socialite::driver($provider)->stateless()->user();

    $linkedSocialAccount = \App\Models\LinkedSocialAccount::where('provider_name', $provider)
        ->where('provider_id', $providerUser->getId())
        ->first();

    if($linkedSocialAccount)
    {
        $token = $linkedSocialAccount->user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'token_type' => 'bearer',
            'access_token' => $token,
        ], 200);
    }
    else
    {
        $user = null;
        $email = $providerUser->getEmail();
        if ($email) {
            $user = User::where('email', $email)->first();
        }
        else
        {
            $email = $providerUser->getId() . '@' . $provider . '.local';
        }
        if (!$user) {
            $user = User::create([
                'name'     => $providerUser->getName(),
                'email'    => $email,
                'password' => 'dfdgdgdf456g34f1d',
            ]);
        }
        $user->linkedSocialAccounts()->create([
            'provider_id' => $providerUser->getId(),
            'provider_name' => $provider,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token_type' => 'bearer',
            'access_token' => $token,
        ], 200);
    }
});
