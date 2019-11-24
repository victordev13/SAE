
<?php
  require_once'../functions.php';
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - SAE</title>
    <link rel="shortcut icon" href="/img/sae.png"/>
    <link rel="stylesheet" type="text/css" href="/SAE/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="/SAE/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/SAE/css/style.css">
    <script type="text/javascript" src="/SAE/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/SAE/js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="/SAE/js/bootstrap.js"></script>
    <script type="text/javascript" src="/SAE/js/functions.js"></script>
</head>
<body>
<main>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
    <img src="../img/sae    .png" height="35" class="d-inline-block align-top" alt="">
    <a class="navbar-brand text-white">Sistema de Gerenciamento de Equipamentos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="Consultar" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Consultar
            </a>
            <div class="dropdown-menu" aria-labelledby="Consultar">
              <a class="dropdown-item" href="busca_aluno.php">Aluno</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="Cadastrar" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Cadastrar
            </a>
            <div class="dropdown-menu" aria-labelledby="Cadastrar">
              <a class="dropdown-item" href="cadastro_aluno.php">Aluno</a>
              <a class="dropdown-item" href="cadastro_estagio.php">Estágio</a>
              <a class="dropdown-item" href="cadastro_relatorio_estagio.php">Relatório de estágio</a>
              <a class="dropdown-item" href="cadastro_horas_complementares.php">Horas complementares</a>
              <a class="dropdown-item" href="cadastro_funcionario.php">Funcionário</a>
            </div>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="Perfil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Olá, <?php echo $_SESSION['usuario'] ?></a>
        <div class="dropdown-menu" aria-labelledby="Perfil">
            <a class="dropdown-item" href="/SAE/includes/editar_perfil.php">Editar</a>
            <a class="dropdown-item" href="/SAE/includes/alterar_senha.php">Alterar senha</a>
            <a class="dropdown-item" href="/SAE/logout.php">Sair</a>
        </li>
    </ul>
  </div>
</nav>
</nav>
