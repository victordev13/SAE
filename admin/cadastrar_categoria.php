<?php
    require_once '../includes/header.php';
    require_once '../db/db_connect.php';
    require_once '../classes/categoria.class.php';
    ValidaSessao("logado", 0);

    if(isset($_POST)){
        if(isset($_POST['nome']) && isset($_POST['periodo_manutencao'])){
            $nome = tratarString($_POST['nome']);
            $periodo_manutencao = tratarString($_POST['periodo_manutencao']);
            $cadastro = Categoria::Cadastrar($nome, $periodo_manutencao);

            print_r($cadastro);
            if($cadastro){
                $_SESSION['sucesso'] = "Equipamento cadastrado com sucesso!";
              }else{
                $_SESSION['erro'] = "Ocorreu um erro ao cadastrar o equipamento!\n Erro: {$cadastro}";
              }
              
        }   
    }
?>
<div class="container mt-3 col-md-6">
<h2>Cadastrar Categoria</h2>
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
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" id="cadastrarEquipamento">
  <div class="form-row">
  	<div class="form-group col-md-4">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da categoria" required="">
    </div>
    <div class="form-group col-md-4">
      <label for="periodo_manutencao">Período Manutenção</label>
      <input type="number" class="form-control" id="periodo_manutencao" name="periodo_manutencao" placeholder="Dias" min=0 max=99999999 required="">
    </div>
 
  </div>
  <button type="submit" class="btn btn-primary" name="cadastrar">Cadastrar</button>
</form>
</div>
<?php
    require_once '../includes/footer.php';
?>