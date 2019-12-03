<?php
include_once "models/Post.php";

class PostController
{
  public function action($route)
  {
    // definição das rotas relacionadas aos posts
    switch ($route) {
      case 'posts':
        $this->showPosts();
        break;

      case 'post-form':
        $this->viewForm();
        break;

      case 'create-post':
        $this->createPost();
        break;

      case 'like-post':
        $this->likePost();
        break;
    }
  }

  private function viewForm()
  {
    include "views/newPost.php";
  }

  private function viewPosts()
  {
    include "views/posts.php";
  }

  private function createPost()
  {
    $user = $_POST['user_id'];
    $description = $_POST['description'];
    $fieldname = "image";
    $targetDir = "views/img/posts/";
    $fileName = $_FILES[$fieldname]['name'];
    $fileSize = $_FILES[$fieldname]['size'];
    $fileType = $_FILES[$fieldname]['type'];
    $tempDir = $_FILES[$fieldname]['tmp_name'];
    $allowedTypes = array('image/svg', 'image/jpeg', 'image/jpg', 'image/png');
    $allowedSize = 1024 * 500;
    $uploadOk = 1;

    // Verifica se a descrição é maior do que 140 caracteres
    if (iconv_strlen($description) > 140) {
      echo "Descrição muito longa. O máximo de caracteres é 140.<br>";
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

        //Se tudo estiver ok, salva a imagem e salva todos os dados do post no banco de dados, direcionando para a página de posts
      } else {
        if (move_uploaded_file($tempDir, $targetFile)) {
          $post = new Post();
          $post->createPost($targetFile, $description, $user);
          header('Location:/desafio-OOP-PHP/posts');
        } else {
          echo "Você deve selecionar uma imagem para salvar.";
        }
      }
    }
  }

  private function showPosts()
  {
    $post = new Post();
    $postList = $post->showPosts();
    $_REQUEST['posts'] = $postList;
    $this->viewPosts();
  }

  private function likePost()
  {
    $user = $_GET['user_id'];
    $post = $_GET['post_id'];
    $like = new Post();
    $likeCount = $like->likePost($user, $post);

    if ($likeCount) {
      header('Location:/desafio-OOP-PHP/posts');
    }
  }
}