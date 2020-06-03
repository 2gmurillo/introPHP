<?php

namespace App\Controllers;

class AdminController extends BaseController
{
  public function getAdminAction()
  {
    return $this->renderHTML('admin.twig', ['brand' => 'ADMIN']);
  }
}
