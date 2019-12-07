<?php
    require_once '../includes/header.php';
    require_once '../db/db_connect.php';
    require_once '../classes/usuario.class.php';
    ValidaSessao("logado", 0);
    global $id;
?>
<div class="container mt-3 col-md-8">
<?php
        if(isset($_GET['erro'])){
            echo "<div class='alert alert-danger alerta-sm' role='alert'>";
            echo $_GET['erro'];
            echo "</div>";
            unset($_GET['erro']);
        }
        if(isset($_GET['m'])){
            echo "<div class='alert alert-success alerta-sm' role='alert'>";
            echo $_GET['m'];
            echo "</div>";
            unset($_GET['m']);
        }
        if(isset($_SESSION['erro'])){
            echo "<div class='alert alert-danger alerta-sm' role='alert'>";
            echo $_SESSION['erro'];
            echo "</div>";
            unset($_SESSION['erro']);
        }
        if(isset($_SESSION['m'])){
            echo "<div class='alert alert-success alerta-sm' role='alert'>";
            echo $_SESSION['m'];
            echo "</div>";
            unset($_SESSION['m']);
        }
    ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nome Completo</th>
      <th scope="col">Usuário</th>
      <th scope="col">Email</th>
      <th scope="col">Tipo<th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
<?php
    $connect = Conexao();
	$sql = "SELECT id_usuario, nome, usuario, email, nivel_usuario FROM usuarios INNER JOIN login_usuario ON id_usuario = id_usuario_fk";
	$resultado = mysqli_query($connect, $sql) or die(mysqli_error($connect));

	$dados = mysqli_fetch_array($resultado);
	$total = mysqli_num_rows($resultado);
		if($total > 0) {
			while ($dados = mysqli_fetch_array($resultado)) {
                $id = $dados['id_usuario'];
                $nome = $dados['nome'];
                $usuario = $dados['usuario'];
                $email = $dados['email'];	
                $tipo = $dados['nivel_usuario'];

                echo "<tr>";
                echo "<td>$nome</td>";
                echo "<td>$usuario</td>";
                echo "<td>$email</td>";

                if($tipo == 0){
                    echo "<td>Administrador</td>";
                }else if($tipo == 1){
                    echo "<td>Padrão</td>";
                }

                echo "<td class='float-right'><a href='editar_usuario.php?id=".$id."'' class='btn btn-primary btn-sm float-left mr-1'>Editar</a>
                <a href='#' class='btn btn-danger btn-sm float-left mr-1' data-toggle='modal' data-target='#modal'>X</a>";
                echo "</tr>";
                }
            }
?>
    </tr>
  </tbody>
</table>

<div class="modal fade" tabindex="-1" role="dialog" id="modal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Aviso!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Deseja excluir o usuário?</p>
      </div>
      <div class="modal-footer">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
          <button type="submit" class="btn btn-danger" value="<?php echo $id ?>" name="excluir">Excluir</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
if(isset($_GET['excluir'])){
    $id = intval($_GET['excluir']);

    if(Usuario::excluirUsuario($id)){
      $_SESSION['m'] = "Usuário excluído com sucesso!";
    }else{
      $_SESSION['erro'] = "Erro ao excluir aluno!";
    }
  }
    require_once '../includes/footer.php';
?>