<?php
session_start();

include("../conexao.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../_css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../_css/botoes.css">
    <link rel="stylesheet" type="text/css" href="../_css/formulario.css">
    <link rel="stylesheet" type="text/css" href="../_css/fundo.css">
    <title>Atualização de Veiculo</title>
</head>
<body>
  <?php  
    include("../includes/menu.php");
  ?>

<?php
            //buscando dados do BD
$id = $_GET['id'];
$pg= $_GET['pg'];
$sql = "SELECT * FROM slv_Veiculo INNER JOIN slv_empresa on empresa_id = veiculo_empresa_id WHERE veiculo_id = '$id' ";
            //selecionando os registros
$resultado = $conexao->prepare($sql);
$resultado->execute();
$linhasVeiculo = $resultado->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
    <h1 class="text-center"> Atualização de Veiculo</h1>
    <form method="post" action="processaVeiculo.php?pg=<?php echo $pg ?>" class="form-signin">
         <span class="caracteres"><?php echo 50 -strlen($linhasVeiculo['veiculo_modelo']); ?></span></span> caracteres restantes
        <input type="text" name="modelo" id="nome" class="form-text" value="<?php if(isset($linhasVeiculo['veiculo_modelo'])){echo $linhasVeiculo['veiculo_modelo'];} ?>"><br><br>
         <span class="renavam">0</span> caracteres restantes
        <input type="text" name="renavam" id="renavam" class="form-control" value="<?php if(isset($linhasVeiculo['veiculo_renavam'])){echo $linhasVeiculo['veiculo_renavam']; } ?> "><br><br>
        
        <input type="text" name="placa" class="form-control" value="<?php if(isset($linhasVeiculo['veiculo_placa'])){echo $linhasVeiculo['veiculo_placa']; }?>"> <br><br>
        
        <label for="empresa">Empresa:</label> <br>
        <output id="empresa"><?php if(isset($linhasVeiculo['empresa_nome'])){echo $linhasVeiculo['empresa_nome'];} ?></output>
        
        <input type="submit" name="enviarAtualização" value="Atualizar" class="form-control btn btn-estilo"><br><br>
        <input type="reset" name="enviarAtualização" value="Apagar" class="form-control btn btn-estilo"> <br><br>
    </form>
    <div class="container">
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="../js/personalizado.js"></script>
<script src="../js/contadorCaractere.js"></script>
<script src="../js/contadorRenavam.js"></script>
<script src="../js/contadorCNPJ.js"></script>
 <script type="text/javascript">
        $(document).ready(function(){
            $('[name=renavam]').mask('00000000000');
            $('[name=placa]').mask('SSS-0A00');
            $('[name=cnpj]').mask('00.000.000/0000-00');
        });
    </script>
</body>
</html>
