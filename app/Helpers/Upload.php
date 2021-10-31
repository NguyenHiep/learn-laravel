<?php

namespace App\Helpers;
use Storage;

class Upload
{

    /***
     * The function upload single file
     *
     * @param string $key
     * @param string $pathSave
     * @return boolean|string  return string if file is valid
     */
    public static function singleFile(string $key, string $pathSave)
    {
        if (request()->hasFile($key) && request()->file($key)->isValid()) {
            return Storage::putFile($pathSave, request()->file($key));
        }
        return false;
    }

    /***
     * The function upload multiples files
     *
     * @param string $keyName input name file upload
     * @param string $pathSave path upload
     * @return array
     */
    public static function multipleFiles(string $keyName, string $pathSave) {
        $files = request()->file($keyName, []);
        $gallery = [];
        if (!empty($files)) {
            foreach ($files as $file) {
                if ($file->isValid()) {
                    $result = Storage::putFile($pathSave, $file);
                    if ($result) {
                        $gallery[] = $result;
                    }
                }
            }
        }
        return $gallery;
    }

}
