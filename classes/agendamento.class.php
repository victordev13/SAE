<?php

class Agendamento
{
	/*
	Aula inicio
		select de 1 a 4
	Aula final
		select de 1 a 4
	*/
	private $aula1 = "19:00";
	private $aula2 = "19:40";
	private $aula3 = "20:40";
	private $aula4 = "22:00";

	private $aula_inicio;
	private $aula_fim;
	private $usuario;
	private $data;
	
	function __construct(){
	}

	function Cadastrar($data, $usuario, $aula_inicio, $aula_fim){
		$connect = Conexao();
		$sql = "";
		$resultado = "";

		if($resultado){
			return true;
		}else{
			return false;
		}
		FecharConexao($connect);
	};

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