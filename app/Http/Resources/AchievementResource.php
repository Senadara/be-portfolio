<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AchievementResource extends JsonResource
{
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
            'description' => $this->description,
            'date' => $this->date,
            'image' => $this->getImageUrl('image'),
            'image_path' => $this->getImagePath('image'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
} 