<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;





/**
 * @OA\Schema()
 */
class UserResource extends JsonResource
{

    /**
     * @param Request $request
     * @return array
     */

    /**
     * @OA\Property(property="name", type="string", example="yaromiradmin@gmail.com"),
     * @OA\Property(property="email", type="string", example="yaromir"),
     * @OA\Property(property="category", type="object", ref="#/components/schemas/CategoryResource"),
     * @OA\Property(
     *      property="attributes",
     *      type="object",
     *      @OA\Property(
     *        property="electric",
     *        description="electric attr",
     *        type="integer",
     *        example=33
     *      ),
     *      @OA\Property(
     *        property="for_women",
     *        description="for_women attr",
     *        type="integer",
     *        example=56
     *      ),
     *     @OA\Property(
     *        property="handicapped",
     *        description="for_women attr",
     *        type="integer",
     *        example=52
     *      ),
     *     @OA\Property(
     *        property="with_kids",
     *        description="for_women attr",
     *        type="integer",
     *        example=12
     *      )
     *    )
     *@OA\Property(property="attr", type="array", @OA\Items(type="string"), example={"hello","hello"})
     * @OA\Property(property="sizes", type="array", @OA\Items( @OA\Property(
     *                         property="name",
     *                         type="string",
     *                         example="medium"
     *                      ),
     *                      @OA\Property(
     *                         property="price",
     *                         type="integer",
     *                         example="600"
     *                      ),
     *                      @OA\Property(
     *                         property="rates",
     *                         type="array",
     *                          @OA\Items(),
     *                         example={{"amount": 2000,
    "hours": "12-14", "days": {1}}}
     *                      ),))
     *
     */
    public function toArray($request)
    {
        return [
            'name'  => $this->name,
            'email' => $this->email
        ];
    }
}
