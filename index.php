<?php
require'functions.php';
session_start();
    if(isset($_POST['login'])){
        if(!empty($_POST['usuario']) && !empty($_POST['senha'])){
            $usuario = tratarString($_POST['usuario']);
            $senha = tratarString($_POST['senha']);
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SAE (Sistema de Agendamento de Equipamentos</title>
    <link rel="shortcut icon" href="img/sae.png"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
</head>
<body class="bg-sae-green">
    <div class="row justify-content-center align-items-center" style="height:100vh; width: 100%">
        <div class="card login sae-form">
            <div class="card-body"> 
            		<img src="img/sae.png" class="logo-form rounded mx-auto d-block">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" id="formLogin" name="formLogin">
                        <?php
                            if(isset($_SESSION['erroLogin'])){
                                    echo "<div class='alert alert-danger txt-sm' role='alert'>";
                                    echo "Usuário e/ou Senha inválido(s) ";
                                    echo "</div>";
                                    session_destroy();
                            }
                            if(isset($_SESSION['logout'])){
                                    echo "<div class='alert alert-warning txt-sm' role='alert'>";
                                    echo "Logout efetuado com sucesso!";
                                    echo "</div>";
                                    session_destroy();
                            }
                        ?>
                    <div class="form-group mt-4" id="campoUsuario">    
                        <input type="text" class="form-control" id="usuario" placeholder="Nome de Usuário" name="usuario" minlength=4 maxlength=20 required="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha" required="" minlength=6 maxlength=12>
                    </div>
                    <button type="submit" class="btn btn-lg btn-block btn-dark" name="login">Login</button>
                    
                    <a href="recuperar_senha.php" class="txt-sm float-center">Esqueceu a senha?</a><br><br>
                    <p>Não tem uma conta?<a href="cadastro.php" class="mt-3"> Cadastre-se</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>