<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * @OA\Post(
     * path="/auth/register",
     * summary="Register",
     * description="Register by email, password",
     * tags={"UnAuthorize"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(ref="#/components/schemas/RegisterFormRequest"),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Unprocessable content",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="The given data was invalid."),
     *    ),
     * ),
     * @OA\Response(
     *    response=201,
     *    description="Registered successfully",
     * ),
     * )
     */
    public function register(RegisterFormRequest $request): JsonResponse
    {
        User::create([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        return response()->json('Registered successfully', 201);
    }
}
