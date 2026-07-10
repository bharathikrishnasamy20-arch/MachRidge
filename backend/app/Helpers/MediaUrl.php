<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class MediaUrl
{
    public static function get(?string $path): ?string
    {
        if (!$path) return null;

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        return Storage::url($path);
    }
}
