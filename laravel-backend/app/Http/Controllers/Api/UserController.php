<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @OA\Get(
     * path="/me",
     * summary="Get user",
     * description="Return user details",
     * tags={"Authorize"},
     * security={ {"sanctum": {} }},
     * @OA\Response(
     *    response=200,
     *    description="User details",
     *    @OA\JsonContent(@OA\Property(property="data", type="object", ref="#/components/schemas/UserResource"),
     * )
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
    public function me(Request $request): UserResource
    {
        return new UserResource($request->user());
    }
}
