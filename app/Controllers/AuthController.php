<?php

namespace App\Controllers;

use App\Models\{User};
use Laminas\Diactoros\Response\RedirectResponse;

class AuthController extends BaseController
{
  public function getLoginAction()
  {
    return $this->renderHTML('login.twig', [
      'brand' => 'JUANGO'
    ]);
  }
  public function postLoginAction($request)
  {
    $getData = $request->getParsedBody();
    $user = User::where('email', $getData['email'])->first();
    $responseMessage = null;
    if ($user) {
      if (\password_verify($getData['password'], $user->password)) {
        $_SESSION['userId'] = $user->id;
        if ($user->email == 'samy@evertec.com') {
          return new RedirectResponse('/introPHP/admin');
        } else {
          return new RedirectResponse('/introPHP/');
        }
      } else {
        $responseMessage = 'Credenciales Incorrectas';
      }
    } else {
      $responseMessage = 'Credenciales Incorrectas';
    }
    return $this->renderHTML('login.twig', [
      'responseMessage' => $responseMessage, 'brand' => 'JUANGO'
    ]);
  }
  public function getLogoutAction()
  {
    unset($_SESSION['userId']);
    return new RedirectResponse('/introPHP/');
  }
}
