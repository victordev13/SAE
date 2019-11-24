<?php
require_once'db/db_connect.php';

function tratarString($string){
	$connect = Conexao();
	$stringTratada = mysqli_real_escape_string($connect, $string);
	return $stringTratada;
	FecharConexao($connect);
}

function ValidaSessao($sessao, $nivelUsuario){
	if(!isset($_SESSION)){
		session_start();
	}
	if(!isset($_SESSION[$sessao]) && !isset($_SESSION['nivelAcesso'])){
		header('Location: ../index.php');
	}else{
		if(isset($_SESSION['nivelAcesso'])){
			if($_SESSION['nivelAcesso'] != $nivelUsuario){
				header("Location: ../index.php");
			}
		}
		
	}
}

function consultaSenhaCadastrada($user_id){
	$connect = Conexao();
	$sql = "SELECT senha FROM login_usuario WHERE id_usuario_fk = '$user_id'";
	$resultado = mysqli_query($connect, $sql);

	if($resultado){
		$dados = mysqli_fetch_array($resultado);
		return $dados['0'];
	}else{
		return false;
	}
	FecharConexao($connect);
}