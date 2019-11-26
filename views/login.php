<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Fakeinsta - Entrar</title>
  <link rel="shortcut icon" href="views/img/favicon.ico" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Grand+Hotel&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="views/css/styles.css">
</head>
<body>
  <form action="/desafio-OOP-PHP/get-user-info" method="post" class="container col-3 flex-wrap text-center">
    <div class="border my-3 px-4 py-2 bg-white">
      <h1 class="form-group mt-3 pb-4">Instagram</h1>
      <input type="text" class="form-group form-control bg-light" name="login" id="login" placeholder="Nome de usuário">
      <input type="password" class="form-group form-control bg-light" name="password" id="password" placeholder="Senha">
      <button type="submit" class="form-group btn btn-primary col-12">Entrar</button>
    </div>
    <div class="border bg-white">
      <p class="different-color py-3 m-0">Não tem uma conta? <a href="/desafio-OOP-PHP/register">Cadastre-se</a></p>
    </div>
  </form>
</body>
</html>