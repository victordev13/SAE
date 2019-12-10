<?php
    require_once '../includes/header.php';
    require_once '../db/db_connect.php';
    require_once '../classes/equipamento.class.php';
    ValidaSessao("logado", 0);

    if(isset($_POST)){
        if(isset($_POST['categoria']) && isset($_POST['patrimonio'])){
            $categoria = tratarString($_POST['categoria']);
            $patrimonio = tratarString($_POST['patrimonio']);
            $cadastro = Equipamento::Cadastrar($categoria, $patrimonio);

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
<h2>Cadastrar Equipamento</h2>
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
      <label for="categoria">Equipamento</label>
      <select id="categoria" class="form-control" name="categoria" required="">
        <?php
            $equipamento = BuscarEquipamentos();
            $equipamento_id = BuscarIdEquipamentos();
            if($equipamento){
                for($i = 0; $i <count($equipamento_id); $i++){
                    echo "<option value='".$equipamento_id[$i]."'>".$equipamento[$i]."</option>"."\n";
                }
            }
        ?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="patrimonio">Patrimônio</label>
      <input type="number" class="form-control" id="patrimonio" name="patrimonio" placeholder="N° Patrimônio" required="">
    </div>
 
  </div>
  <button type="submit" class="btn btn-primary" name="cadastrar">Cadastrar</button>
</form>
</div>
<?php
    require_once '../includes/footer.php';
?>