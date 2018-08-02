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
     * @return \Illuminate\Http\Response
     */
    protected static function successJsonResponse($message = null, $data = null)
    {
        $response = [ 'status' => true ];
        self::_addBasicField($response, $message,  $data);
        return response()->json($response, 200);
    }

    /**
     * Generate a failed response json.
     * 
     * @param String $message 
     * @param Array  $data  
     * 
     * @return \Illuminate\Http\Response
     */
    protected static function failedJsonResponse($message = null, $data = null)
    {
        $response = [ 'status' => false ];
        self::_addBasicField($response, $message,  $data);
        return response()->json($response, 200);
    }
    
    /**
     * Push basice response field into a source array.
     * 
     * @param Array  $sourceArray 
     * @param String $message 
     * @param Array  $data  
     * 
     * @return void
     */
    private static function _addBasicField(&$sourceArray, &$message = null, &$data = null)
    {
        if (!is_null($message)) {
            $sourceArray = array_merge($sourceArray, ['message' => $message]);
        }
    
        if (!is_null($data)) {
            $sourceArray = array_merge($sourceArray, ['data' => $data]);
        }
    }
}