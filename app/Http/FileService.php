<?php

namespace App\Http;

use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\exactly;

class FileService
{
    public static function upload($file, $dir = '/', $default = 'default/default.jpg')
    {
        if ($file != null) {
            $path = $file->store($dir, 'public');
        } else {
            $path = $default;
        }
//        return '/storage/'.$path;
        return url('/storage/' . $path);
    }

    //$dir можно добавить имя папки
    public static function delete($file)
    {
//        $path = $dir . '/'. $file;
//        $path = $file;
        $path = '/public/products/' . pathinfo($file, PATHINFO_BASENAME);
//        dd($path);
        if (Storage::exists($path) || $path == '/public/products/default.jpg') {
            return Storage::delete($path);
        }
        return false;
    }

    public static function update($oldFile, $dir, $newFile = '')
    {
        if ($newFile != "" && $oldFile != 'default/default.jpg') {
            FileService::delete($oldFile);
            return FileService::upload($newFile, $dir);
        }
        return $oldFile;
    }
}
