<?php

namespace App\CommonClasses;

use Illuminate\Support\Str;

class FileUploader
{
    /**
     *  Creating random filename
     *
     * @param $file
     * @return string
     */
    public static function createFileName($file): string
    {
        $ext = $file->getClientOriginalExtension();
        $hash = md5(Str::random(10) . time());

        return $hash . '.' . $ext;
    }


    /**
     * @param $original_file_name
     * @return string
     */
    public static function createFileNameByOriginal($original_file_name): string
    {
        $arr = explode('.', $original_file_name);
        $ext = end($arr);
        $hash = md5(Str::random(10) . time());

        return $hash . '.' . $ext;
    }

}
