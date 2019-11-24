<?php
    require_once'../functions.php';
    require_once'../includes/header.php';
    require_once'../classes/usuario.class.php';
    
if(isset($_SESSION['usuario'])){
  $dados = Usuario::BuscarPerfil($_SESSION['user_id']); 
}
if(isset($_POST['salvar'])){
  if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['usuario'])){
    $nome = tratarString($_POST['nome']);
    $email = tratarString($_POST['email']);
    $usuario =tratarString($_POST['usuario']);
    if(Usuario::Update($nome, $email, $usuario, $dados['0'])){
        $_SESSION['sucesso'] = "Alterado com sucesso!";
        if($_SESSION['nivelAcesso'] == 0){
            header("Location: /SAE/admin/index.php");
        }else{
            header("Location: /SAE/user/index.php");
        }
        
    }else{
        $_SESSION['erro'] = "Erro ao alterar cadastro!";
        if($_SESSION['nivelAcesso'] == 0){
            header("Location: /SAE/admin/index.php");
        }else{
            header("Location: /SAE/user/index.php");
        }
    }
  }
}
?>
<div class="container mt-3 col-md-6">
<h2>Editar</h2>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" id="cadastrarAluno">
  <div class="form-row">
    <div class="form-group col">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" placeholder="Nome completo" name="nome" value="<?php echo $dados['1']; ?>" required="">
    </div>
    <div class="form-group col">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $dados['2']; ?>" required="">
    </div>    
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="usuario">Usuario</label>
      <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $dados['3']; ?>" required="">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
</form>
</div>
<?php
    require_once 'footer.php';
?>