<?php

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
	if(!isset($_SESSION[$sessao]) && !isset($_SESSION['nivelUsuario'])){
		header('Location: index.php');
	}else{
		if($_SESSION['nivelUsuario'] != $nivelUsuario){
			header('Location: index.php');
		}
	}
}
