<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\PostResourceCollection;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @OA\Get(
     * path="/posts",
     * summary="Get list of posts",
     * description="Return a list of posts",
     * tags={"Authorize"},
     * security={ {"sanctum": {} }},
     * @OA\Response(
     *    response=200,
     *    description="Posts list",
     *    @OA\JsonContent(ref="#/components/schemas/PostResourceCollection")
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
    public function index()
    {
        return new PostResourceCollection(Post::paginate(8));
    }

    /**
     * @OA\Get(
     * path="/posts/{id}",
     * summary="Get post by id",
     * description="Returns a post with same id",
     * tags={"Authorize"},
     * security={ {"sanctum": {} }},
     * @OA\Parameter(
     *    name="id",
     *    in="path",
     *    description="post Id",
     *    @OA\Schema(
     *        type="integer",
     *     ),
     *    required=true,
     *    example=87
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Post",
     *    @OA\JsonContent(@OA\Property(property="data", type="object", ref="#/components/schemas/PostResource")),
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
    public function show(Post $post)
    {
        return new PostResource($post);
    }
}
