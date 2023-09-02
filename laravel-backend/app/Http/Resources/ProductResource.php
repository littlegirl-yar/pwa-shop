<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema()
 */
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    /**
     * @OA\Property(property="id", type="integer", example="22"),
     * @OA\Property(property="category_id", type="integer", example="3"),
     * @OA\Property(property="name", type="string", example="coll laptop gt6"),
     * @OA\Property(property="description", type="string", example="some text goes here"),
     * @OA\Property(property="price", type="float", example="1488.92"),
     * @OA\Property(property="image", type="string", example="https://logos-world.net/wp-content/uploads/2020/11/Fox-News-Channel-Emblem.png"),
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->image,
        ];
    }
}
