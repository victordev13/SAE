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
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" id="formLogin">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required="">
                    </div>
                    <button type="submit" class="btn btn-default btn-dark mr-3">Recuperar</button>
                    <a href="javascript:history.go(-1)">Voltar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>