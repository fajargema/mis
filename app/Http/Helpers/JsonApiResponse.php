<?php

namespace App\Http\Helpers;

use Illuminate\Http\Response;

class JsonApiResponse
{
    public static function success($data, $message = 'Success', $statusCode = Response::HTTP_OK)
    {
        return response()->json([
            'meta' => [
                'message' => $message,
                'status_code' => $statusCode,
            ],
            'data' => $data,
        ], $statusCode);
    }

    public static function error($message, $statusCode, $errorDetails = null)
    {
        $response = [
            'error' => [
                'message' => $message,
                'status_code' => $statusCode,
            ],
        ];

        if ($errorDetails) {
            $response['error']['details'] = $errorDetails;
        }

        return response()->json($response, $statusCode);
    }
}
