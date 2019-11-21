<?php

require'db/db_connect.php';

class Usuario {
    private $nome;
    private $usuario;
    private $senha;
    private $email;

    public function Login($usuario, $senha){
        $conexao = Conexao();

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

        $res_query = mysqli_query($conexao, $sql);

        if(mysqli_num_rows($res_query)){
            $dados = mysqli_fetch_array($res_query);
            $_SESSION['logado'] = true;
            $_SESSION['usuario'] = $dados[1];
            $_SESSION['senha'] = $dados[2];
            $_SESSION['nivelAcesso'] = $dados[3];
            header("Location: admin/index.php");
        }else{
            $_SESSION['erroLogin'] = true;
            $_SESSION['erroLoginUsuario'] = 1;
            header('Location: index.php');
        }
        FecharConexao($conexao);
    }
}

?>