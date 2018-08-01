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
    protected function successJsonResponse($message = null, $data = null)
    {
        $response = [ 'status' => true ];
        $this->_addBasicField($response, $message,  $data);
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
    protected function failedJsonResponse($message = null, $data = null)
    {
        $response = [ 'status' => false ];
        $this->_addBasicField($response, $message,  $data);
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
    private function _addBasicField(&$sourceArray, &$message = null, &$data = null)
    {
        if (!is_null($message)) {
            array_push($response, ['message' => $message]);
        }
    
        if (!is_null($data)) {
            array_push($response, ['data' => $data]);
        }
    }
}