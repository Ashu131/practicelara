<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

class ApiController extends Controller
{
    protected $statusCode=200;

    /**
     * @return $statusCode
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     */
    public function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function respondNotFound($message= 'Not Found!')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }

    public function respond($data)
    {
        return Response::json($data, $this->getStatusCode());
    }

    public function respondWithError($message)
    {
        return $this->respond([
            'error'=>[
                'message'   =>  $message,
                'status_code'=> $this->getStatusCode()
            ]
        ]);
    }

    public function respondCreated($message)
    {
        return $this->setStatusCode(201)->respond([
            'message'=>$message
        ]);
    }
}
