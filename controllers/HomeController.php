<?php

class HomeController
{
  public function action($route)
  {
    // definição da rota relacionada ao post
    switch ($route) {
      case 'home':
        $this->viewHome();
        break;
    }
  }

  private function viewHome()
  {
    include "views/home.php";
  }
}