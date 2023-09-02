<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TokenFormRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @OA\Post(
     * path="/auth/token",
     * summary="Sign in",
     * description="Login by email, password",
     * tags={"UnAuthorize"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(ref="#/components/schemas/TokenFormRequest"),
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Returns when user is not authenticated",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Invalid login details"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns a token",
     *    @OA\JsonContent(
     *       @OA\Property(property="access_token", type="string", example="1|m4p08WGD33rXJdae404Ef0OLDX5KLtwB0QWvxGUn"),
     *       @OA\Property(property="token_type", type="string", example="Bearer"),
     *    ),
     * ),
     * )
     */
    public function token(TokenFormRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request->get('email'))->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer'
        ]);
    }
    /**
     * @OA\Post(
     * path="/auth/logout",
     * summary="Logout",
     * description="Logout user and invalidate token",
     * tags={"Authorize"},
     * security={ {"sanctum": {} }},
     * @OA\Response(
     *    response=200,
     *    description="Logged out",
     *),
     * @OA\Response(
     *    response=401,
     *    description="Returns when user is not authenticated",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Unauthenticated"),
     *    ),
     * ),
     * )
     */
    public function logout(Request $request) : JsonResponse
    {
        Auth::guard('web')->logout();

        $request->user()->currentAccessToken()->delete();

        return response()->json('Logged out',200);
    }
}
