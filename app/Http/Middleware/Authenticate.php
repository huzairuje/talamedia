<?php

namespace App\Http\Middleware;

use App\Http\Library\ApiBaseResponse;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        $responseLib = new ApiBaseResponse();
        if (!$request->expectsJson()) {
            return route('login');
        }
        throw new HttpResponseException(response()->json($responseLib->unauthorizedResponse(),
            Response::HTTP_UNAUTHORIZED));
    }
}
