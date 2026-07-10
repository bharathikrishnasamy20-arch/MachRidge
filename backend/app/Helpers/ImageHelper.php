<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    public static function uploadImage($file, string $directory = 'uploads'): string
    {
        $path = $file->store($directory, 'public');
        return Storage::url($path);
    }

    public static function deleteImage(?string $path): bool
    {
        if (!$path) {
            return false;
        }

        $relativePath = str_replace('/storage/', '', parse_url($path, PHP_URL_PATH));

        if (Storage::disk('public')->exists($relativePath)) {
            return Storage::disk('public')->delete($relativePath);
        }

        return false;
    }

    public static function getImageUrl(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        if (str_starts_with($path, 'http')) {
            return $path;
        }

        return url($path);
    }
}
