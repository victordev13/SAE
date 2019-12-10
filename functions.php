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


function BuscarUsuario(){
	$connect = Conexao();
	$sql = "SELECT * FROM aluno WHERE matricula = '$matricula'";
	$resultado = mysqli_query($connect, $sql);
	if($resultado){
		while($row_dados = mysqli_fetch_array($resultado)){
			$aluno[] = $row_dados['aluno_id'];
			$aluno[] = $row_dados['nome'];
			$aluno[] = $row_dados['matricula'];
			$aluno[]= $row_dados['curso_id'];
			$aluno[]= $row_dados['curso'];
			$aluno[]= $row_dados['cpf'];
			$aluno[]= $row_dados['senha'];
		}
		if(!empty($aluno)){
			return $aluno;
		}
	}else{
		return false;
	}
}
function BuscarAgendamentos(){
	$connect = Conexao();
	$sql = "SELECT id_agendamento, a.data, CONCAT(c.nome, ' ', e.cod) AS equipamento, u.nome, a.inicio, a.fim, a.observacao FROM `agendamento` A INNER JOIN usuarios U ON usuario = id_usuario INNER JOIN equipamento E ON equipamento = id_equipamento INNER JOIN categoria C ON c.id_equipamento = e.categoria;";
	$resultado = mysqli_query($connect, $sql);
	if($resultado){
		while($row_dados = mysqli_fetch_array($resultado)){
			$title = strtok($row_dados['nome'], " ")." - ".$row_dados['equipamento'];
			$inicio = $row_dados['inicio'];
			$dados[] = $row_dados['fim'];
			$dados[] = $row_dados['id_agendamento'];
			$dados[] = $row_dados['data'];
			$dados[] = $row_dados['observacao'];

			$eventos[] = [
				'title' => $title,
			];
		}
		if(!empty($dados)){
			return $dados;
		}
	}else{
		return false;

	}
}