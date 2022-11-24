<?php

use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


function saveImage($folder, $file) {

    $full_name = Str::random(16) . '.' . $file->getClientOriginalExtension();
    $path = $file->storeAs('public/images/'.$folder, $full_name);
    return $path;
}

function saveVideo($folder, $file) {

    $full_name = Str::random(16) . '.' . $file->getClientOriginalExtension();
    $path = $file->storeAs('public/videos/'.$folder, $full_name);
    return $path;
}

/**
 * this saves large medium small sizes of the main image of the product in
 * path == storage/app/public/images/product_img/{small,medium,large}/file_name.
 *
 * @param [type] $folder
 * @param [type] $file
 * @return void
 */
function saveSizedImage($folder, $file) {

    $full_name = Str::random(16) . '.' . $file->getClientOriginalExtension();
    $path = 'public/images/'.$folder.'/large/'.$full_name;
    $image = Image::make($file)->resize(1000,1000);
    Storage::put($path, $image->encode());

    $path = 'public/images/'.$folder.'/medium/'.$full_name;
    $image = Image::make($file)->resize(500,500);
    Storage::put($path, $image->encode());

    $path = 'public/images/'.$folder.'/small/'.$full_name;
    $image = Image::make($file)->resize(250,250);
    Storage::put($path, $image->encode());

    return  $full_name;
}


function deleteImage($path) {
   return Storage::delete($path);
}

function deleteSizedImage($folder, $fileName)
{
    Storage::delete('public/images/'.$folder.'/small/'.$fileName);
    Storage::delete('public/images/'.$folder.'/medium/'.$fileName);
    Storage::delete('public/images/'.$folder.'/large/'.$fileName);
}

function deleteVideo ($path) {
    return Storage::delete($path);
}

function changeWith($string, $word, $newWord) {
    return Str::replace($string,$word, $newWord);
}
