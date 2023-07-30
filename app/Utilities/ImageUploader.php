<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageUploader
{
    public static function upload($image, $path, $diskType = 'local_storage')
    {
        storage::disk($diskType)->put($path, File::get($image));
    }

}
