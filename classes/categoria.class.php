<?php
require_once'../functions.php';

class Categoria
{
	
	private $nome;
	private $periodo_manutencao;
	
	function __construct(){
		
	}

	function Cadastrar($nome, $periodo_manutencao){
		$connect = Conexao();

		$sql = "INSERT INTO `categoria`(`nome`, `periodo_manutencao`) VALUES ('$nome','$periodo_manutencao')";
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