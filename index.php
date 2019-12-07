<?php
require_once'functions.php';
require_once __DIR__.'/classes/usuario.class.php';

session_start();

    if(isset($_POST['login'])){
        if(!empty($_POST['usuario']) && !empty($_POST['senha'])){
            $usuario = tratarString($_POST['usuario']);
            $senha = tratarString($_POST['senha']);
            $senha = md5($senha);

            Usuario::Login($usuario, $senha);
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SAE (Sistema de Agendamento de Equipamentos)</title>
    <link rel="shortcut icon" href="img/sae.png"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
</head>
<body class="bg-sae-dark">
    <div class="row justify-content-center align-items-center" style="height:100vh; width: 100%">
        <div class="card login sae-form">
            <div class="card-body"> 
            		<img src="img/sae.png" class="logo-form rounded mx-auto d-block">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" id="formLogin" name="formLogin">
                        <?php
                            if(isset($_GET['erroLogin'])){
                                    echo "<div class='alert alert-danger txt-sm' role='alert'>";
                                    echo "Usuário e/ou Senha inválido(s) ";
                                    echo "</div>";
                            }
                            if(isset($_GET['logout'])){
                                    echo "<div class='alert alert-warning txt-sm' role='alert'>";
                                    echo "Logout efetuado com sucesso!";
                                    echo "</div>";
                            }
                            if(isset($_GET['m'])){
                                $mensagem = tratarString($_GET['m']);
                                echo "<div class='alert alert-warning txt-sm' role='alert'>";
                                echo $mensagem;
                                echo "</div>";
                            }
                            if(isset($_SESSION['logado']) && isset($_SESSION['nivelAcesso'])){
                                if($_SESSION['nivelAcesso'] == 0){
                                    echo "<div class='alert alert-danger txt-sm' role='alert'>";
                                    echo "Você está logado como Administrador! <a href='admin/index.php' class='alert-link'>Acessar</a> / <a href='logout.php' class='alert-link'>Sair</a>";
                                    echo "</div>";
                                }else if($_SESSION['nivelAcesso'] == 1){
                                    echo "<div class='alert alert-warning txt-sm' role='alert'>";
                                    echo "Você já está logado! <a href='user/index.php' class='alert-link'>Acessar</a> / <a href='logout.php' class='alert-link'>Sair</a>";
                                    echo "</div>";
                                }
                            }
                        ?>
                    <div class="form-group mt-4" id="campoUsuario">    
                        <input type="text" class="form-control" id="usuario" placeholder="Nome de Usuário" name="usuario" minlength=4 maxlength=20 required="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha" required="" minlength=6 maxlength=12>
                    </div>
                    <button type="submit" class="btn btn-lg btn-block btn-primary" name="login">Login</button>
                    <p>Não tem uma conta?<a href="cadastro.php" class="mt-3"> Cadastre-se</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>