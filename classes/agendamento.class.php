<?php

class Agendamento
{

	private $inicio;
	private $fim;
	private $usuario;
	private $data;
	
	function __construct(){
	}

	function Cadastrar($user_id, $data, $equipamento, $inicio, $fim, $observacao){
		$connect = Conexao();
		$sql = "INSERT INTO `agendamento`( `id_agendamento`, `usuario`, `data`, `equipamento`, `inicio`, `fim`, `observacao`) VALUES (NULL, '$user_id','$data', '$equipamento','$inicio', '$fim', '$observacao')";
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