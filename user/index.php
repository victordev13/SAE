<?php
require_once'../functions.php';
require_once'../includes/header.php';
ValidaSessao("logado", 1);

?>

<div class="container mt-5">
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
    

</div>
<?php
include_once'../includes/footer.php';
?>