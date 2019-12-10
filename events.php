<?php
require_once'db/db_connect.php';

	$connect = Conexao();
	$sql = "SELECT `data`, u.nome, CONCAT(c.nome, e.cod) As equipamento, i.inicio, f.fim FROM `agendamento` A INNER JOIN horario_aula i ON i.aula = a.inicio INNER JOIN horario_aula f ON f.aula = a.fim INNER JOIN equipamento E ON equipamento = id_equipamento INNER JOIN usuarios U ON usuario = id_usuario INNER JOIN categoria C ON c.id_equipamento = e.categoria;";
	
	$resultado = mysqli_query($connect, $sql);

	if($resultado){
		while($row_dados = mysqli_fetch_array($resultado)){
			$title = strtok($row_dados['nome'], " ")." - ".$row_dados['equipamento'];
			$start = $row_dados['data']."T".$row_dados['inicio'];
			$end = $row_dados['data']."T".$row_dados['fim'];

			$eventos[] = [
				'title' => $title,
				'start' => $start,
				'end' => $end
			];
		}
	}
	
	echo json_encode($eventos);