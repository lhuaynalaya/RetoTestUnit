<?php

namespace App\Http\Middleware;
use Closure;
use App\Models\OrganizacionUsuario;
use App\Models\AccessToken;

class UserAuth {
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next) {
    $authorization = $request->headers->get('authorization');
    $organizacion_id = $request->get('organizacion_id');

    if (!isset($authorization)) {
      $authorization = $request->get('mcrm');
    }

    if (isset($authorization) && isset($organizacion_id)) {
      $access_token_id = str_replace('Bearer ', '', $authorization);
      $access_tokens = AccessToken::where('access_token_id', $access_token_id)->get();

      if (isset($access_tokens) && count($access_tokens) > 0) {
        $access_token = $access_tokens[0];
        $usuarios = OrganizacionUsuario::where([
            ['muid', '=', $access_token->muid],
            ['organizacion_id', '=', $organizacion_id]
        ])->get();

        if (isset($usuarios) && count($usuarios) > 0) {
          $usuario = $usuarios[0];
          session(['org_usuario_id' => $usuario->id]);
        }
      }
    }

    if (session('org_usuario_id', '') === '') {
      return response([
          'message' => 'No autorizado'
      ], 401);
    }
    return $next($request);
  }
}