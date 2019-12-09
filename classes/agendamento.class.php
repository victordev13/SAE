<?php

class Agendamento
{
	/*
	Aula inicio
		select de 1 a 4
	Aula final
		select de 1 a 4
	*/
	private $aula1 = 1;
	private $aula2 = 2;
	private $aula3 = 3;
	private $aula4 = 4;

	private $inicio;
	private $fim;
	private $usuario;
	private $data;
	
	function __construct(){
	}

	function Cadastrar($usuario, $data, $equipamento, $inicio, $fim, $observacao){
		$connect = Conexao();
		$sql = "INSERT INTO `agendamento`(`usuario`, `data`, `equipamento`, `inicio`, `fim`, `observacao`) VALUES ('$usuario', '$data','$equipamento','$inicio', '$fim', '$observacao')";
		$resultado = mysqli_query($connect, $sql);

		if($resultado){
			return true;
		}else{
			return false;
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

	function Consulta(){
		
	}
}