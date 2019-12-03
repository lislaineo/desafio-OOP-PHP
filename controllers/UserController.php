<?php
include_once "models/User.php";

class UserController
{
  public function action($route)
  {
    // definição das rotas relacionadas aos usuários
    switch ($route) {
      case 'login':
        $this->viewLogin();
        break;

      case 'logout':
        $this->logout();
        break;

      case 'register':
        $this->viewRegister();
        break;

      case 'create-user':
        $this->createUser();
        break;

      case 'get-user-info':
        $this->getUserInfo();
        break;
    }
  }

  // método que exibe a página com o formulário de login
  private function viewLogin()
  {
    include "views/login.php";
  }

  // método que faz o logout do usuário
  private function logout()
  {
    session_start();
    session_destroy();
    header('Location:/desafio-OOP-PHP/home');
  }

  // método que exibe o formulário de cadastro de usuário
  private function viewRegister()
  {
    include "views/register.php";
  }

  // método para salvar no banco de dados informações sobre um novo usuário
  private function createUser()
  {
    $login = $_POST['login'];
    $pass = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $hashPass = password_hash($pass, PASSWORD_DEFAULT);
    $fieldname = "profilePic";
    $targetDir = "views/img/profiles/";
    $fileName = $_FILES[$fieldname]['name'];
    $fileSize = $_FILES[$fieldname]['size'];
    $fileType = $_FILES[$fieldname]['type'];
    $tempDir = $_FILES[$fieldname]['tmp_name'];
    $allowedTypes = array('image/svg', 'image/jpeg', 'image/jpg', 'image/png');
    $allowedSize = 1024 * 500;
    $uploadOk = 1;

    // Verifica se a senha é maior do que 8 caracteres para poder prosseguir
    if (iconv_strlen($pass) < 8) {
      echo "A senha escolhida é muito curta. Você deve usar no mínimo 8 caracteres.<br>";
      $uploadOk = 0;
    }
    //Valida se a imagem foi selecionada
    if (isset($fileName)) {
      //Renomeia a imagem: data do envio_nome do arquivo
      $newFileName = date("d-M-Y_") . $fileName;
      $targetFile = $targetDir . $newFileName;

      //Verifica se já existe uma imagem com o mesmo nome
      if (file_exists($targetFile)) {
        echo "Já existe um arquivo com esse nome. Por favor, use outro nome.<br>";
        $uploadOk = 0;

        //Verifica o formato do arquivo e compara com uma lista de extensões pré-definidas
      } elseif (array_search($fileType, $allowedTypes) === false) {
        echo "O tipo de arquivo enviado é inválido. Somente imagens são aceitas.<br>";
        $uploadOk = 0;

        //Verifica o tamanho do arquivo e compara com o máximo pré-estabelecido
      } elseif ($fileSize > $allowedSize) {
        echo "O tamanho do arquivo enviado é maior que o limite. Por favor, diminua o tamanho da imagem.<br>";
        $uploadOk = 0;

        //Última verificação para checar se algum erro deixou $uploadOk igual a 0
      } elseif ($uploadOk == 0) {
        echo "Não foi possível cadastrar o post.";

        //Se tudo estiver ok, salva a imagem e salva todos os dados do usuário no banco de dados, direcionando para a página de posts
      } else {
        if (move_uploaded_file($tempDir, $targetFile)) {
          $user = new User();
          $result = $user->createUser($targetFile, $login, $hashPass, $name, $email);
          $this->getUserInfo();
          header('Location:/desafio-OOP-PHP/posts');
        } else {
          echo "Você deve selecionar uma imagem para salvar.";
        }
      }
    }
  }

  // método que recebe as informações de login e faz a autenticação de usuário
  private function getUserInfo()
  {
    $login = $_POST['login'];
    $pass = $_POST['password'];

    $user = new User();
    $userInfo = $user->getUserInfo($login);
    $_POST['users'] = $userInfo;

    if (password_verify($pass, $userInfo[0]->password)) {
      session_start();
      $_SESSION['login'] = $login;
      $_SESSION['user_id'] = $userInfo[0]->id;
      header('Location:/desafio-OOP-PHP/posts');
    } else {
      echo "Sinto muito! Seu login e/ou sua senha estão errados.";
    }
  }
}
