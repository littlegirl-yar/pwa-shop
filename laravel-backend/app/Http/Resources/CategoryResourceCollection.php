<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @OA\Schema()
 */
class CategoryResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    /**
     * @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/CategoryResource"))
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
