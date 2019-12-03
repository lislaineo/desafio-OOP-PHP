<?php
class HomeController
{
  public function action($route)
  {
    // definição da rota relacionada a home
    switch ($route) {
      case 'home':
        $this->viewHome();
        break;
    }
  }

  // método que exibe a página inicial
  private function viewHome()
  {
    include "views/home.php";
  }
}