<?php

use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

function saveImage($folder, $file) {

    $full_name      = Str::random(16) . '.' . $file->getClientOriginalExtension();
    $path = $file->storeAs('public/images/'.$folder, $full_name);
    return $path;
}


function deleteImage($path) {
   return Storage::delete($path);
}