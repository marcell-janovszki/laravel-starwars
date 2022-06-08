<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class ResponseHelper
{

    // @dev prevent instantiation by declaring private constructor
    private function __construct() {}

    // @dev makes a request using the specified `$method` to the given `$url` and returns the json responce as an array.
    public static function getResponseAsArray($method, $url) {
        // @dev TODO: create a static `$client` variable which can be reused within this class
        $client = new Client();
        $res = $client->request($method, $url);
        $data = json_decode($res->getBody()->getContents(), true);
        
        return $data;
    }

}