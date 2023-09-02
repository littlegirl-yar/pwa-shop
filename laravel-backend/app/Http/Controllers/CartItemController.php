<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartItemRequest;
use App\Http\Resources\CartItemResource;
use App\Http\Resources\CartItemResourceCollection;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $cartItems = CartItem::with('product')->where('user_id', $user_id)->get();
        return new CartItemResourceCollection($cartItems);
    }

    /**
     * @OA\Delete (
     * path="/cartitems/{id}",
     * summary="Delete cartitem",
     * description="Delete cartitem by id",
     * tags={"Authorize"},
     * security={ {"sanctum": {} }},
     * @OA\Parameter(
     *    name="id",
     *    in="path",
     *    description="cartitem Id",
     *    @OA\Schema(
     *        type="integer",
     *     ),
     *    required=true,
     *    example=87
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Item deleted",
     *     @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Item removed successfully from cart"),
     *    ),
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Returns when user is not authenticated",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Unauthenticated"),
     *    ),
     * ),
     *
     * )
     */
    public function destroy(CartItem $cartitem)
    {
        $cartitem->delete();
        return response()->json(['message' => 'Item removed successfully from cart'], 200);
    }

    public function store(AddCartItemRequest $request)
    {
        $cartItem = $request->user()->cartItems()->where('product_id', $request->input('product_id'))->first();
        if($cartItem){
            $cartItem->amount = $cartItem->amount + $request->input('amount');
            $cartItem->save();
        }
        else{
            $cartItem = $request->user()->cartItems()->create($request->validated());
        }
        return new CartItemResource($cartItem);
    }
}
