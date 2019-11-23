<?php
require_once'db/db_connect.php';

class Usuario {
    private $nome;
    private $usuario;
    private $senha;
    private $email;

    public function Login($usuario, $senha){

        $conexao = Conexao();

        $sql = "SELECT * FROM login_usuario WHERE usuario = '$usuario' AND senha = '$senha'";

        $res_query = mysqli_query($conexao, $sql);

        if(mysqli_num_rows($res_query)){
            $dados = mysqli_fetch_array($res_query);
            $_SESSION['logado'] = true;
            $_SESSION['usuario'] = $dados[1];
            $_SESSION['senha'] = $dados[2];
            $_SESSION['nivelAcesso'] = $dados[3];

            if ($_SESSION['nivelAcesso'] == 0){
                header("Location: admin/index.php");
            }else if ($_SESSION['nivelAcesso'] == 1){
                header("Location: user/index.php");
            }
            
        }else{
            header('Location: index.php?erroLogin');

        }
        FecharConexao($conexao);
    }

    public function Cadastrar($nome, $email, $usuario, $senha){
        $connect = Conexao();
        $nivelAcesso = 1;
		$sql = "INSERT INTO `usuarios` (nome, email) VALUES('$nome', '$email');";
		$resultado = mysqli_query($connect, $sql);
		$sql = "SET @funcionario_id = LAST_INSERT_ID();";
		$resultado = mysqli_query($connect, $sql);  
		$sql = "INSERT INTO `login_usuario`(`usuario`, `senha`, `nivel_usuario`, `id_usuario_fk`) VALUES('$usuario', '$senha', '$nivelAcesso', @funcionario_id);";
        $resultado = mysqli_query($connect, $sql) or die(mysqli_error($connect));
        
		if($resultado){
			return true;
		}else{
			return $resultado;
        }
        
        FecharConexao($connect);
    }

    public function RecuperarSenha(){

    }
}

?>