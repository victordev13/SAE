<?php
    require_once '../includes/header.php';
    require_once '../db/db_connect.php';
    require_once '../classes/usuario.class.php';
    ValidaSessao("logado", 0);

    if(isset($_POST)){
        if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['usuario']) && isset($_POST['senha'])){
            $nome = tratarString($_POST['nome']);
            $email = tratarString($_POST['email']);
            $usuario = tratarString($_POST['usuario']);
            $senha = tratarString($_POST['senha']);
            $senha = md5($senha);
            $acesso= 1;
            $cadastro = Usuario::Cadastrar($nome, $email, $usuario, $senha, $acesso);
            if($cadastro){
                $_SESSION['sucesso'] = "Usuário ".$nome." cadastrado com sucesso!";
              }else{
                $_SESSION['erro'] = "Ocorreu um erro ao inserir os dados!";
              }
        }   
    }
?>
<div class="container mt-3 col-md-6">
<h2>Cadastrar Usuário</h2>
<?php
if(isset($_SESSION['erro'])){
    echo "<div class='alert alert-danger alerta-sm' role='alert'>";
    echo $_SESSION['erro'];
    echo "</div>";
    unset($_SESSION['erro']);
}
if(isset($_SESSION['sucesso'])){
    echo "<div class='alert alert-success alerta-sm' role='alert'>";
    echo $_SESSION['sucesso'];
    echo "</div>";
    unset($_SESSION['sucesso']);
}
?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" id="cadastrarUsuario">
  <div class="form-row">
    <div class="form-group col">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" placeholder="Nome completo" name="nome" required="">
    </div>
    <div class="form-group col">
      <label for="email">Email</label>
      <input type="email" class="cpf form-control" id="email" placeholder="Email" name="email" required="">
    </div>    
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="usuario">Nome de usuário</label>
      <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nome de Usuário" required="">
    </div>
    <div class="form-group col-md-4">
    
      <label for="senha">Senha</label>
      <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" minlength=6 required="">
    </div>
    <div class="form-group col-md-4">
      <label for="acesso">Nível de Acesso</label>
      <select id="acesso" class="form-control" name="acesso" required="">
        <option value='0'>Administrador</option>
        <option value='1' selected>Padrão</option>
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
</div>
<?php
    require_once '../includes/footer.php';
?>