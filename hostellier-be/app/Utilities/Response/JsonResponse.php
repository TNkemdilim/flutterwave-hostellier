<?php

namespace App\Utilities\Response;

trait JsonResponse
{
    /**
     * Generate a success response json.
     * 
     * @param String $message 
     * @param Array  $data  
     * 
     * @return JsonResponse
     */
    protected function successJsonResponse($message = null, $data = null)
    {
        $response = [ 'status' => true ];
        if (!is_null($message)) {
            array_push($response, ['message' => $message]);
        }

        if (!is_null($data)) {
            array_push($response, ['data' => $data]);
        }

        return response()->json($response);
    }
}