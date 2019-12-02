<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Fakeinsta - Cadastre-se</title>
  <link rel="shortcut icon" href="views/img/favicon.ico" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Grand+Hotel&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="views/css/styles.css">
</head>
<body>
  <form action="/desafio-OOP-PHP/create-user" method="post" class="container col-3 flex-wrap text-center" enctype="multipart/form-data">
    <div class="border my-3 px-4 bg-white">
      <h1 class="form-group mt-3">Instagram</h1>
      <h3 class="form-group">Cadastre-se para ver fotos dos seus amigos.</h3>
      <input type="text" class="form-group form-control bg-light" name="name" id="name" placeholder="Nome" required>
      <input type="file" class="form-group form-control bg-light" name="profilePic" id="profilePic" required>
      <input type="email" class="form-group form-control bg-light" name="email" id="email" placeholder="E-mail" required>
      <input type="text" class="form-group form-control bg-light" name="login" id="login" placeholder="Nome de usuário" required>
      <input type="password" class="form-group form-control bg-light" name="password" id="password" placeholder="Senha" required>
      <button type="submit" class="form-group btn btn-primary col-12">Cadastre-se</button>
      <p>Ao se cadastrar, você concorda com nossos <strong>Termos</strong>, <strong>Política de Dados</strong> e <strong>Política de Cookies</strong>.</p>
    </div>
    <div class="border bg-white">
      <p class="different-color py-2 m-0">Tem uma conta? <a href="/desafio-OOP-PHP/login">Conecte-se</a></p>
    </div>
  </form>
</body>
</html>