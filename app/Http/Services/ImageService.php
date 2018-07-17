<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class ImageService
{
    public function uploadImage($file, $folder_path, $for, $size)
    {
        $img = ImageManagerStatic::make($file);
        if ($img->getWidth()) {
            $img->resize($size, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $img->stream();

        if (env('STORAGE_FILE', 'server')=='server') {
            $path = 'images/'.$folder_path.'/'.$for->hash_id.'-'.str_random(6).'.'.$file->clientExtension();
            Storage::disk('uploads')->put($path, $img->__toString());

            return $path;
        } elseif (env('STORAGE_FILE', 'server')=='s3') {
            $path = 'images/'.$folder_path.'/'.$for->hash_id.'-'.str_random(6).'.'.$file->clientExtension();
            Storage::disk('s3')->put($path, $img->__toString());

            return $path;
        }

        return null;
    }

    public function deleteFile($file)
    {
        if (env('STORAGE_FILE', 'server')=='server') {
            if(file_exists(public_path().'/uploads/'.$file)) {
                \File::delete(public_path().'/uploads/'.$file);
            }
        } elseif (env('STORAGE_FILE', 'server')=='s3') {
            if (Storage::disk('s3')->has($file)) {
                Storage::disk('s3')->delete($file);
            }
        }

        return true;
    }

    public function getFile($file)
    {
        if (env('STORAGE_FILE', 'server')=='server') {
            return url('/').'/uploads/'.$file;
        } elseif (env('STORAGE_FILE', 'server')=='s3') {
            return 'https://s3.amazonaws.com/'.env('AWS_BUCKET').'/'.$file;
        }
    }
}