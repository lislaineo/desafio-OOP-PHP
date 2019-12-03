<?php 
include_once "models/User.php";

class UserController
{
    public function action($route)
    {
        //qual ação vai tomar
        switch ($route) {
            case 'login':
                $this->viewLogin();
                break;
            
            case 'logout':
                $this->viewLogout();
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

    private function viewLogin()
    {
        include "views/login.php";
    }

    private function viewLogout()
    {
        session_start();
        session_destroy();
        header('Location:/desafio-OOP-PHP/home');
    }

    private function viewRegister()
    {
        include "views/register.php";
    }

    private function createUser()
    {
        $login = $_POST['login'];
        $pass = $_POST['password'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $hashPass = password_hash($pass,PASSWORD_DEFAULT);
        $fieldname = "profilePic";
        $targetDir = "views/img/profiles/";
        $fileName = $_FILES[$fieldname]['name'];
        $fileSize = $_FILES[$fieldname]['size'];
        $fileType = $_FILES[$fieldname]['type'];
        $tempDir = $_FILES[$fieldname]['tmp_name'];
        //Lista de tipos de arquivos permitidos como imagem do produto
        $allowedTypes = array('image/svg', 'image/jpeg', 'image/jpg', 'image/png');
        //Tamanho máximo permitido da imagem (em bytes)
        $allowedSize = 1024 * 500; //500Kb
        $uploadOk = 1;

        //Valida se a imagem foi selecionada
        if (isset($fileName)) {
            //Renomeia a imagem: data do envio_nome do arquivo
            $newFileName = date("d-M-Y_").$fileName;
            $targetFile = $targetDir.$newFileName;

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
            
            //Se tudo estiver ok, salva a imagem
            } else {
                if (move_uploaded_file($tempDir, $targetFile)) {
                    $user = new User();
                    $result = $user->createUser($targetFile,$login,$hashPass,$name,$email);
                    $this->getUserInfo();
                    header('Location:/desafio-OOP-PHP/posts');
                } else  {
                    echo "Você deve selecionar uma imagem para salvar.";
                }
            }
        }
    }

    private function getUserInfo()
    {
        $login = $_POST['login'];
        $pass = $_POST['password'];
       
        $user = new User();
        $userInfo = $user->getUserInfo($login);
        $_POST['users'] = $userInfo;

        if(password_verify($pass,$userInfo[0]->password)) {
            session_start();
            $_SESSION['login'] = $login;
            $_SESSION['user_id'] = $userInfo[0]->id;
            header('Location:/desafio-OOP-PHP/posts');
        } else {
            echo "Senha errada";
        }
    }
}


?>