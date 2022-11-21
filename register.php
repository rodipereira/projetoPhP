<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poke loja</title>
    <link rel="stylesheet" href="/css/estiloCadastro.css">
    <link rel="shortcut icon" href="/favicon/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="titulo">Cadastre-se</div>
        <form method="post">
            <div class="detalhes-usuario">
                <div class="input-box">
                    <span class="detalhes">Nome completo</span>
                    <input type="text" placeholder="Insira seu nome completo" required>
                </div>
                <div class="input-box">
                    <span class="detalhes">Nome de usuário</span>
                    <input type="text" placeholder="Insira seu nome de usuário" required>
                </div>
                <div class="input-box">
                    <span class="detalhes">Email</span>
                    <input type="email" placeholder="Insira seu email" required>
                </div>
                <div class="input-box">
                    <span class="detalhes">Número de telefone</span>
                    <input type="number" placeholder="Insira seu número de telefone" required>
                </div>
                <div class="input-box">
                    <span class="detalhes">Senha</span>
                    <input type="password" placeholder="Insira sua senha" required>
                </div>
                <div class="input-box">
                    <span class="detalhes">Confirme a senha</span>
                    <input type="password" placeholder="Confirme a sua senha" required>
                </div>
            </div>
            <div class="detalhes-genero">
                <input type="radio" name="genero" id="dot-1">
                <input type="radio" name="genero" id="dot-2">
                <input type="radio" name="genero" id="dot-3">
                <span class="titulo-genero">Gênero</span>
                <div class="categorias">
                    <label for="dot-1">
                        <span class="escolha um"></span>
                        <span class="genero">Masculino</span>
                    </label>
                    <label for="dot-2">
                        <span class="escolha dois"></span>
                        <span class="genero">Feminino</span>
                    </label>
                    <label for="dot-3">
                        <span class="escolha tres"></span>
                        <span class="genero">Prefiro não dizer</span>
                    </label>
                </div>
            </div>
            <div class="botao">
                <input type="submit" value="Cadastrar">
            </div>
        </form>
    </div>
</body>
</html>