<?php
session_start();

include("../conexao.php");    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../_css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../_css/botoes.css">
    <link rel="stylesheet" type="text/css" href="../_css/formulario.css">
    <link rel="stylesheet" type="text/css" href="../_css/fundo.css">
    <title>Cadastro de Veiculo</title>
</head>
<body>
    <?php include("../includes/menu.php"); ?>


<div class="container">
    <h1 class="text-center"> Cadastro de Veiculo</h1>
    <form method="post" action="processaVeiculo.php" class="form-signin">
        <span class="caracteres">50</span> caracteres restantes
        <input type="text" id="nome" name="modelo" class="form-text" placeholder="Modelo" onkeyup="maiuscula(this﻿)﻿﻿" autofocus><br><br>
        <span class="renavam">11</span> caracteres restantes
        <input type="text" name="renavam" id="renavam" class="form-control" placeholder="Renavam "><br><br>
        <input type="text" name="placa" class="form-control" placeholder="Placa" class="form-signin" onkeyup="maiuscula(this﻿)﻿﻿"> <br><br>
        <select name=empresa_id class="form-control"> 
            <option>CNPJ</option>
            <?php
            $query = "SELECT * from slv_empresa";
            $selecionar =$conexao->prepare($query);
            $selecionar->execute();
            while ($linhas =$selecionar->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $linhas['empresa_id']; ?>"> <?php echo $linhas['empresa_cnpj']; ?> </option>    
            <?php } ?>
        </select>
        <br><br>
        <input type="submit" name="enviarCadastro" value="Cadastrar" class=" form-control btn btn-estilo"><br><br>
        <input type="reset" value="Apagar Campos" class=" form-control btn btn-estilo">
    </form>
    <div class="container text-center">
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
<script src="../js/logout.js"></script>
<script src="../js/contadorCaractere.js"></script>
<script src="../js/contadorRenavam.js"></script>
<script src="../js/jquery.mask.min.js"></script>
<script type="text/javascript">
        // INICIO FUNÇÃO DE MASCARA MAIUSCULA E LIMITADOR DE CARACTERES
        function maiuscula(z){
            v = z.value.toUpperCase();
            z.value = v;
            z.value = z.value.substring(0,50);
        }
        //FIM DA FUNÇÃO MASCARA MAIUSCULA E LIMITADOR DE CARACTERES
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[name=renavam]').mask('00000000000');
            $('[name=placa]').mask('SSS-0A00');

        });
    </script>
<script type="text/javascript"> 
</body>
</html>
