<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'name' => $this->name,
            'title' => $this->title,
            'bio' => $this->bio,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'photo' => $this->getImageUrl('photo'),
            'photo_path' => $this->getImagePath('photo'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
} 