<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    // Lorsqu'on souhaite modifier la clé d'affichage data par notre propre clé au niveau des api
    
    // public static $wrap = 'property';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            $this->mergeWhen(true, [
                'price' => $this->price,
                'surface' => $this->surface,
                'city' => $this->city,
            ]),
            'price' => $this->whenHas(true, $this->prive),
            'options' => OptionResource::collection($this->whenLoaded('options'))
        ];
    }
}
