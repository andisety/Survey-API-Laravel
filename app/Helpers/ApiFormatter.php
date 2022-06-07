<?php

namespace App\Helpers;

class ApiFormatter
{

    protected static $response = [
        // 'code' => null,
        // 'message' => null,
        'survey' => null
    ];

    // public static function createApi($code = null, $message = null, $survey = null)
    public static function createApi($survey = null)

    {
        // self::$response['code'] = $code;
        // self::$response['message'] = $message;
        self::$response['survey'] = $survey;

        return response()->json(self::$response);
    }
}
