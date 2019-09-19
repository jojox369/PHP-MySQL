<?php
session_start();
include("../conexao.php");

?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"  type="text/css" href="../_css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../_css/botoes.css">
    <link rel="stylesheet" type="text/css" href="../_css/formulario.css">
    <link rel="stylesheet" type="text/css" href="../_css/fundo.css">
    <title>Pagina de Login</title>
</head>

<body>


                <nav class="navbar  navbar-light  bg-dark">
        <div class="text-light" style="text-align:right;">
            <script type="text/javascript" src="../js/data.js"></script>
        </div>

        <ul class="nav justify-content-end ">
        <li class="nav-item">
          <a class="text-light nav-link " href="../index.php" title="Encerrar Sessão" > Inicio </a>
        </li>
        </ul>
        <div class="text-light">
            <label ID="Clock">00:00:00</label>
            <script type="text/javascript" src="../js/hora.js"></script>
        </div>
    </nav>

                
<br><br><br><br>     
<div class="container">
<br><br><br><br>
<h1 class="text-center">Pagina de Login</h1>

    <form method="POST" action="processaADM.php"  class="form-signin">
    <span class="caracteres">50</span> caracteres restantes<br>
    <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira Seu nome" onkeyup="maiuscula(this)" onkeypress="return ApenasLetras(event,this);" maxlength="50">
           <br><br>
        <input type="text" class="form-control"  name="cpf"  placeholder="Insira o CPF">
           <br><br>
        <input type="password" class="form-control" name="senha" placeholder="Insira a senha">
        <br><br>
        <input type="submit" name="enviarCadastro" value="Cadastrar" class="form-control btn btn-estilo"><br><br>
       
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
    <script src="../js/jquery.mask.min.js"></script>
    <script src="../js/logout.js"></script>
    <script type="text/javascript" src="../js/contadorCaractere.js"></script>
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
            $('[name=cpf]').mask('000.000.000-00');
           
        });
    </script>
    <script type="text/javascript"> 
// APERNAS LETRAS
function ApenasLetras(e, t) {
    try {
        if (window.event) {
            var charCode = window.event.keyCode;
        } else if (e) {
            var charCode = e.which;
        } else {
            return true;
        }
        if ( charCode == 32 ||
            (charCode > 64 && charCode < 91) || 
            (charCode > 96 && charCode < 123) ||
            (charCode > 191 && charCode <= 255) // letras com acentos
            ){
            return true;
    } else {
        alert("Não digite números");
        return false;
    }
} catch (err) {
    alert(err.Description);
}
}
</script>
</body>

</html>
