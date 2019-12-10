<?php
require_once'../functions.php';

class Equipamento
{
	
	private $cod;
	private $categoria;
	private $patrimonio;
	
	function __construct(){
		
	}

	function Cadastrar($categoria, $patrimonio){
		$connect = Conexao();

		$sql_cod = "SELECT MAX(cod) FROM `equipamento` WHERE categoria='$categoria';";
		$resultado = mysqli_query($connect, $sql_cod);

		if($resultado){
			$max_cod = mysqli_fetch_array($resultado);
			$cod = $max_cod['0'] + 1;
		}
		else{
			return $sql_cod;
			exit;
		}

		$sql = "INSERT INTO `equipamento`(`cod`, `patrimonio`, `categoria`, `data`) VALUES ('$cod', '$patrimonio', '$categoria', CURDATE())";
		$resultado = mysqli_query($connect, $sql);

		if($resultado){
			return true;
		}else{
			return $sql;
		}
		FecharConexao($connect);
	}

	function Update(){
		$connect = Conexao();
		$sql = "";
		$resultado = "";

		if($resultado){
			return true;
		}else{
			return false;
		}
		FecharConexao($connect);
	}

	function Remover(){
		$connect = Conexao();
		$sql = "";
		$resultado = "";

		if($resultado){
			return true;
		}else{
			return false;
		}
		FecharConexao($connect);
	}

	
}