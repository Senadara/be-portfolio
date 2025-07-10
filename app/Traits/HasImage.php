<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasImage
{
    /**
     * Get the image URL for the model
     *
     * @param string|null $field
     * @return string|null
     */
    public function getImageUrl($field = 'image')
    {
        if (!$this->{$field}) {
            return null;
        }
        return asset($this->{$field});
    }

    /**
     * Get the image path for the model
     *
     * @param string|null $field
     * @return string|null
     */
    public function getImagePath($field = 'image')
    {
        if (!$this->{$field}) {
            return null;
        }

        // If it's already a full path, return as is
        if (str_starts_with($this->{$field}, '/')) {
            return $this->{$field};
        }

        // Default: assume it's stored in public disk
        return 'storage/' . $this->{$field};
    }

    /**
     * Check if the model has an image
     *
     * @param string|null $field
     * @return bool
     */
    public function hasImage($field = 'image')
    {
        return !empty($this->{$field});
    }
} 