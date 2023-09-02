<?php

namespace App\Http\Controllers;


use App\Http\Resources\CategoryResourceCollection;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @OA\Get(
     * path="/categories",
     * summary="Get list of categories",
     * description="Return a list of categories",
     * tags={"Authorize"},
     * security={ {"sanctum": {} }},
     * @OA\Response(
     *    response=200,
     *    description="Categories list",
     *    @OA\JsonContent(ref="#/components/schemas/CategoryResourceCollection")
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
        return new CategoryResourceCollection(Category::all());
    }
}
