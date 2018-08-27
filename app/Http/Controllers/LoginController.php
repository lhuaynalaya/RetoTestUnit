<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Auth\LoginProxy;
use Illuminate\Http\Request;

use App\Services\AccessToken as AccessTokenService;

class LoginController extends Controller {
  private $loginProxy;
  private $accessTokenService;

  public function __construct(LoginProxy $loginProxy,
                              AccessTokenService $accessTokenService)
  {
    $this->loginProxy = $loginProxy;
    $this->accessTokenService = $accessTokenService;
  }

  public function login(Request $request)
  {
    $email = $request->get('email');
    $password = $request->get('password');
    $respuesta = $this->loginProxy->attemptLogin($email, $password);

    if (isset($respuesta)) {
      $access_data = [
        'access_token_id' => $respuesta['access_token'],
        'refresh_token_id' => $respuesta['refresh_token'],
        'organizacion_usuario_id' => '',
        'scopes' => ''
      ];
      $this->accessTokenService->store($access_data);
    }

    return response($respuesta);
  }

  public function refresh(Request $request)
  {
    return response($this->loginProxy->attemptRefresh());
  }

  public function logout()
  {
    $this->loginProxy->logout();

    return response(null, 204);
  }
}