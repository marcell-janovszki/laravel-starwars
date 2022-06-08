<?php

namespace App\Helpers;

class JSONHelper
{

    // @dev prevent instantiation by declaring private constructor
    private function __construct() {}

    public static function readJSONFile($file_name) {
        $file_string = file_get_contents(storage_path('app')."/".$file_name);
        $data = json_decode($file_string, true);

        return $data;
    }

    public static function writeJSONToFile($file_name, $json) {
        return file_put_contents(storage_path('app')."/".$file_name, $json);
    }

}