<?php
    require_once '../db/db_connect.php';
    require_once '../classes/usuario.class.php';
    require_once '../functions.php';

if(isset($_GET['id'])){
  $id = tratarString($_GET['id']);
  $dados = Usuario::BuscarPerfil($id);
}

if(isset($_POST['editar'])){
  if(isset($_POST['nome']) && isset($_POST['usuario']) && isset($_POST['email']) && isset($_POST['acesso'])){
    $id = $_POST['id'];
    $nome = tratarString($_POST['nome']);
    $usuario =tratarString($_POST['usuario']);
    $email =tratarString($_POST['email']);
    $acesso =tratarString($_POST['acesso']);
    $dados = Usuario::BuscarPerfil($id); 
    $update = Usuario::UpdatePerfil($nome, $email, $usuario, $acesso, $id);
    if($update){
        header("Location:consulta_usuario.php?m=Alterado com sucesso!");
    }else{
        header("Location:consulta_usuario.php?erro=Erro ao alterar cadastro!");
    }
    
  }
}
require_once '../includes/header.php';

?>
<div class="container mt-3 col-md-6">
<h2>Editar usuário</h2>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" id="editarUsuario">
<input type="hidden" name="id" id="id" value=<?php if(isset($_GET['id'])){echo $_GET['id'];}?>>
  <div class="form-row">
    <div class="form-group col">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" placeholder="Nome completo" name="nome" value="<?php echo $dados['1']; ?>" required="">
    </div>
    <div class="form-group col">
      <label for="usuario">Usuario</label>
      <input type="text" class="cpf form-control" id="usuario" placeholder="Usuário" name="usuario" value="<?php echo $dados['3']; ?>" minlength=5 maxlength=12>
    </div>    
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $dados['2']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="curso">Nível de Acesso</label>
      <select id="acesso" class="form-control" name="acesso" required="">
        <option></option>
        <option value='0' <?php if($dados['4'] == 0) echo "selected" ?>>Administrador</option>
        <option value='1' <?php if($dados['4'] == 1) echo "selected" ?>>Padrão</option>
      </select>
    </div>
</div>
  <button type="submit" class="btn btn-primary" name="editar">Salvar</button>
</form>
</div>
<?php
    require_once '../includes/footer.php';
?>