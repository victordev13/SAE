
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
    <link rel="shortcut icon" href="/SAE/img/mouse-icon.png"/>
    <link rel="stylesheet" type="text/css" href="/SAE/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="/SAE/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/SAE/css/style.css">
    <!-- Full Calendar CSS -->
    <link href='/SAE/css/fullcalendar/core/main.css' rel='stylesheet' />
    <link href='/SAE/css/fullcalendar/daygrid/main.css' rel='stylesheet' />
    <link href='/SAE/css/fullcalendar/timegrid/main.css' rel='stylesheet' />
    <!-- Fim -->
    <script type="text/javascript" src="/SAE/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/SAE/js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="/SAE/js/bootstrap.js"></script>
    <script type="text/javascript" src="/SAE/js/functions.js"></script>
    <script src="https://kit.fontawesome.com/33bf191c75.js" crossorigin="anonymous"></script>
    <!-- Full Calendas JS -->
    <script src='/SAE/js/fullcalendar/core/main.js'></script>
    <script src='/SAE/js/fullcalendar/core/locales/pt-br.js'></script>
    <script src='/SAE/js/fullcalendar/interaction/main.js'></script>
    <script src='/SAE/js/fullcalendar/daygrid/main.js'></script>
    <script src='/SAE/js/fullcalendar/timegrid/main.js'></script>
    <!-- Fim -->
</head>
<body>
<main>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
    <a href="<?php if($_SESSION['nivelAcesso'] == 0){ echo '/SAE/admin/index.php';}else{ echo '/SAE/user/index.php';}?>"><img src="../img/sae.png" height="35" class="d-inline-block align-top" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php

  if(isset($_SESSION['nivelAcesso'])){
    if($_SESSION['nivelAcesso'] == 0){
      include '../admin/menu.html';
    }else if($_SESSION['nivelAcesso'] == 1){
      include_once '../user/menu.html';
    }else{
      echo "Erro ao incluir o menu";
    }
  }
    
  ?>
        <li class="nav-item dropdown">
        <a class="nav-link" href="#" id="Perfil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle fa-lg fa-w-16 text-light fa-2x"></i></a>
        <div class="dropdown-menu" aria-labelledby="Perfil">
            <a class="dropdown-item" href="/SAE/includes/editar_perfil.php">Editar</a>
            <a class="dropdown-item" href="/SAE/includes/alterar_senha.php">Alterar senha</a>
            <a class="dropdown-item" href="/SAE/logout.php">Sair</a>
        </li>
    </ul>
  </div>
</nav>
</nav>
