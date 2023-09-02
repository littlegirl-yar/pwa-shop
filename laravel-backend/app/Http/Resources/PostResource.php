<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema()
 */
class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    /**
     * @OA\Property(property="id", type="integer", example="3"),
     * @OA\Property(property="title", type="string", example="title for post"),
     * @OA\Property(property="description", type="string", example="some text goes here"),
     * @OA\Property(property="image", type="string", example="https://logos-world.net/wp-content/uploads/2020/11/Fox-News-Channel-Emblem.png"),
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
        ];
    }
}
