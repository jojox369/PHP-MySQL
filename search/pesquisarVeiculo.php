<?php
session_start();

    include("../conexao.php");
$pg = $_GET['pg'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../_css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../_css/botoes.css">
    <link rel="stylesheet" type="text/css" href="../_css/formulario.css">
    <link rel="stylesheet" type="text/css" href="../_css/fundo.css">
    <title> Pesquisa de Veiculo </title>
</head>
<body>
  <?php  
    include("../includes/menu.php");
  ?>
<br><br>
<div class="container">
    <h1 class="text-center"> Campos de Pesquisa </h1>
    <form method="post" action="processaVeiculo.php?pg=<?php echo $pg ?>"  class="form-signin">
        <span class="caracteres">50</span> caracteres restantes
        <input type="text" id="nome" name="modelo" class="form-text" placeholder="Modelo" onkeyup="maiuscula(this﻿)﻿﻿" maxlength=50><br><br>
        <input type="number" name="renavam" class="form-control" placeholder="Renavam ">
        <br><br>
        <input type="text" name="placa" class="form-control" placeholder="Placa " onkeyup="maiuscula(this﻿)">
        <br><br>
       

        <input type="submit" value="Pesquisar" class="form-control btn btn-estilo"><br><br>
        <input type="reset" value="Apagar Campos" class="form-control btn btn-estilo">
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="../js/personalizado.js"></script>
<script src="../js/contadorCaractere.js"></script>
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
           // $('[name=cnpj]').mask('00.000.000/0000-00');
        });
    </script>
    <script type="text/javascript"> 
        </body>
        </html>
      
  