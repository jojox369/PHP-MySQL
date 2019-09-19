<?php
session_start();


    include("../conexao.php");
$pg = $_GET['pg'];
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
    <title>Pesquisar Funcionario</title>
</head>
<body>

  <?php  
    include("../includes/menu.php");
  ?>
    <div class="container ">
       <h1 class="text-center"> Campos de Pesquisa </h1>
       <form method="post" action='processaFuncionario.php?pg=<?php echo $pg ?>' class="form-signin">
       <span class="caracteres">50</span> caracteres restantes<br>
           <input type="text" id="nome" name="nome" class="form-text" placeholder="Insira o nome " onkeyup="maiuscula(this)" onkeypress="return ApenasLetras(event,this);" maxlength="50">
           <br><br>
            <span class="numeros">10</span> numeros restantes<br>
           <input type="number" class="form-control" name="matricula" id="matricula" maxlength="10"  placeholder="Insira a Matricula">
           <br><br>
           <input type="text" class="form-control" name="cpf"  placeholder="Insira o CPF">
           <br><br>
           
           
            
           
           <br><br>
           <input type="submit" value="Pesquisar" class="form-control btn btn-estilo"><br><br>
           <input type="reset" value="Apagar Campos" class="form-control btn btn-estilo">
       </form>
   </div>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <script src="../js/personalizado.js"></script>
   <script src="../js/logout.js"></script>
   <script src="../js/contadorCaractere.js"></script>
   <script src="../js/contadorNumero.js"></script>
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
            $('[name=cpf]').mask('000.000.000-00')
            
            $('[name=matricula]').mask('0000000000');
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
            if ((charCode == 32 || charCode == 13) ||
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
