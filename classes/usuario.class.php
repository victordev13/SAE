<?php

class Usuario {
    private $nome;
    private $usuario;
    private $senha;
    private $email;
    private $nivelAcesso;

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
            $_SESSION['user_id'] = $dados['4'];

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

    public function Cadastrar($nome, $email, $usuario, $senha, $acesso){
        $connect = Conexao();
        $nivelAcesso = $acesso;
		$sql = "INSERT INTO `usuarios` (nome, email) VALUES('$nome', '$email');";
		$resultado = mysqli_query($connect, $sql);
		$sql = "SET @funcionario_id = LAST_INSERT_ID();";
		$resultado = mysqli_query($connect, $sql);  
		$sql = "INSERT INTO `login_usuario`(`usuario`, `senha`, `nivel_usuario`, `id_usuario_fk`) VALUES('$usuario', '$senha', '$nivelAcesso', @funcionario_id);";
        $resultado = mysqli_query($connect, $sql) or die(mysqli_error($connect));
        
		if($resultado){
			return true;
		}else{
			return false;
        }
        
        FecharConexao($connect);
    }

    public function AlterarSenha($senhaAntiga, $novaSenha, $user_id){
        $connect = Conexao();

        $sql = "UPDATE login_usuario SET senha='$novaSenha' WHERE id_usuario_fk='$user_id'";
        $resultado = mysqli_query($connect, $sql)  or die(mysqli_error($connect));
        
        if($resultado){
            return true;
        }else{
            return false;
        }
        FecharConexao($connect);
    }
    
    public function RecuperarSenha(){

    }

    public function BuscarPerfil($user_id){
        $connect = Conexao();
        $sql = "SELECT * FROM usuarios INNER JOIN login_usuario ON id_usuario = id_usuario_fk WHERE id_usuario = '$user_id';";
        $resultado = mysqli_query($connect, $sql);
        if($resultado){
            while($row_perfil = mysqli_fetch_array($resultado)){
                $perfil[] = $row_perfil['id_usuario'];
                $perfil[] = $row_perfil['nome'];
                $perfil[] = $row_perfil['email'];
                $perfil[] = $row_perfil['usuario'];
                $perfil[] = $row_perfil['nivel_usuario'];
            }
            if(!empty($perfil)){
                return $perfil;
            }
        }else{
            return false;
        }
        FecharConexao($connect);
    }
    public function Update($nome, $email, $usuario, $user_id){
        $connect = Conexao();
	    $sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id_usuario='$user_id';";
	    $resultado = mysqli_query($connect, $sql);
	    $sql = "UPDATE login_usuario SET usuario='$usuario' nivel_usuario='$acesso' WHERE id_usuario_fk='$user_id';";
	    $resultado = mysqli_query($connect, $sql);
	    if($resultado){
	    	return true;
	    }else{ 
	    	return false;
	    }
	    FecharConexao($connect);
    }

    public function UpdatePerfil($nome, $email, $usuario, $acesso, $id){
        $connect = Conexao();
	    $sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id_usuario='$id';";
	    $resultado = mysqli_query($connect, $sql);
	    $sql = "UPDATE login_usuario SET usuario='$usuario', nivel_usuario='$acesso' WHERE id_usuario_fk='$id';";
	    $resultado = mysqli_query($connect, $sql);
	    if($resultado){
	    	return true;
	    }else{ 
	    	return $resultado;
	    }
	    FecharConexao($connect);
    }

    public function excluirUsuario($id){
        $connect = Conexao();
        $sql = "DELETE FROM login_usuario WHERE id_usuario_fk='$id';";
        $resultado = mysqli_query($connect, $sql);
        $sql = "DELETE FROM usuarios WHERE id_usuario='$id';";
        $resultado = mysqli_query($connect, $sql);
        if($resultado){
            return true;
        }else{ 
            return false;
        }
        FecharConexao($connect);
    }
}

?>