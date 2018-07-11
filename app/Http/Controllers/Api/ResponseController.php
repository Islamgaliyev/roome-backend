<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Http\Controllers\Controller;

class ResponseController extends Controller
{
	

    /**
     * Return generic json response with the given data.
     *
     * @param $data
     * @param int $statusCode
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */

    protected function respond($data, $statusCode = 200, $headers = []){
        return response()->json($data, $statusCode, $headers);
    }


    /**
     * Respond with success.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    protected function respondSuccess($data){
        return $this->respond($data);
    }


    /**
     * Respond with created.
     *
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */

    protected function respondCreated($id){
        return $this->respond([
            'success' => [
                'id' => $id,
                'status_code' => 201
            ]
        ], 201);
    }


    /**
     * Respond with no content.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    
    protected function respondNoContent(){
        return $this->respond(null, 204);
    }


    /**
     * Respond with error.
     *
     * @param $message
     * @param $statusCode
     * @return \Illuminate\Http\JsonResponse
     */

    protected function respondError($message, $statusCode){
        return $this->respond([
            'errors' => [
                'message' => $message,
                'status_code' => $statusCode
            ]
        ], $statusCode);
    }


    /**
     * Respond with unauthorized.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */

    protected function respondUnauthorized($message = 'Unauthorized'){
        return $this->respondError($message, 401);
    }


    /**
     * Respond with forbidden.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */

    protected function respondForbidden($message = 'Forbidden'){
        return $this->respondError($message, 403);
    }


    /**
     * Respond with not found.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondNotFound($message = 'Not Found'){
        return $this->respondError($message, 404);
    }


    /**
     * Respond with failed login.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    protected function respondFailedLogin(){
        return $this->respond([
            'errors' => [
                'email or password' => 'is invalid',
            ]
        ], 422);
    }


    /**
     * Respond with internal error.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondInternalError($message = 'Internal Error'){
        return $this->respondError($message, 500);
    }

    /**
     * Respond with invalid Attribute error.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */

    protected function respondInvalidAttribute($message){
        return $this->respondError($message, 406);
    }

    /**
     * Respond with status of like. Yes or no.
     *
     * @param array $status
     * @return \Illuminate\Http\JsonResponse
     */

    protected function respondLikeAd($status){
        return $this->respond([
            'is_like' => $status
        ], 202);
    }  


    protected function respondRespondAd($status){
        return $this->respond([
            'respond_status' => $status
        ], 202);
    }

    protected function respondCurrentStatus($data){
        return $this->respond([
            'data' => $data
        ], 202);
    }

    protected function respondAllResponds($users){
        return $this->respond([
            'users' => $users
        ], 202);
    }

    protected function respondApproveAd($status){
        return $this->respond([
            'status' => $status
        ], 202);
    }

    protected function respondAllApprovedAds($data){
        return $this->respond([
            'data' => $data
        ], 202);
    }
    
}