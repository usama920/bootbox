<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        dd($this);
        return [
            'cart_identity' => $this->id ?? '',
            'quantity' => $this->quantity ?? '',
            'sub_price' => $this->subscription_price ?? '',
            'price' => $this->total_price ?? '',
            'size' => $this->CartSize->name ?? '',
            'sub_type' => $this->CartSubscription->name ?? '',
            'product' => $this->CartProduct->product_name ?? '',
            'image' => $this->CartProduct->ProductImages[0]->name ?? '',

        ];
    }
}
