<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_name' => $this->product_name ?? '',
            'product_slug' => $this->product_slug ?? '',
            'description' => $this->description ?? '',
            'slug' => $this->product_slug ?? '',
            'price' => $this->product_price ?? '',
            'sub_category' => $this->SubCategoryName->name ?? '',
            'category' => $this->SubCategoryName->CategoryData->name ?? '',
            'gender' => $this->GenderName->name ?? '',
            'image' => $this->ProductImages ?? '',
        ];
}
}
