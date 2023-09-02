<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * @OA\Get(
     * path="/categories/{id}/products",
     * summary="Get products by category",
     * description="Return a list of products that belong to category",
     * tags={"Authorize"},
     * security={ {"sanctum": {} }},
     * @OA\Parameter(
     *    name="id",
     *    in="path",
     *    description="category Id",
     *    @OA\Schema(
     *        type="integer",
     *     ),
     *    required=true,
     *    example=3
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Products list",
     *    @OA\JsonContent(ref="#/components/schemas/ProductResourceCollection")
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
    public function index(Category $category)
    {
        return new ProductResourceCollection($category->products()->paginate(8));
    }

    /**
     * @OA\Get(
     * path="/products/{id}",
     * summary="Get product by id",
     * description="Returns a product with same id",
     * tags={"Authorize"},
     * security={ {"sanctum": {} }},
     * @OA\Parameter(
     *    name="id",
     *    in="path",
     *    description="product Id",
     *    @OA\Schema(
     *        type="integer",
     *     ),
     *    required=true,
     *    example=87
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Post",
     *    @OA\JsonContent(@OA\Property(property="data", type="object", ref="#/components/schemas/ProductResource")),
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
    public function show(Product $product)
    {
        return new ProductResource($product);
    }
}
