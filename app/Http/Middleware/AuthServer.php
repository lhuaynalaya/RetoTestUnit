<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;

class AuthServer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $http = new Client();
      try {
        $authorization = $request->headers->get('authorization');
        $response = $http->get(env('API_URL').'/api/validate-token', [
            'headers' => [
                'Authorization' => $authorization,
                'Accept' => 'application/json'
            ]
        ]);
        $status = $response->getStatusCode();
      } catch (\Exception $e) {
        $status = 401;
      }

      if ($status !== 200 && $status !== '200') {
        return response([
          'message' => 'No autorizado'
        ], 401);
      }

      return $next($request);
    }
}
