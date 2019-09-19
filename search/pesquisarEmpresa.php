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
    <title> Pesquisa de Empresa </title>
</head>
<body>
   <?php  
    include("../includes/menu.php");
  ?>
<div class="container">
    <h1 class="text-center"> Campos de Pesquisa </h1>
    <form method="post" action="processaEmpresa.php?pg=<?php echo $pg ?>" class="form-signin">
     
    <form method="post" action="processaEmpresa.php"  class="form-signin">
    <span class="caracteres">50</span> Restantes <br>
            <input type="text" name="nome" id="nome" class="form-text" placeholder="Nome " onkeyup="maiuscula(this)" onkeypress="return ApenasLetras(event,this);" maxlength="50"><br>
            <span class="telefone">13</span> Restantes <br>
            <input type="text" id="telefone" name="telefone" class="form-control" onkeyup="maiuscula(this)"placeholder="Telefone"><br><br>
            <select name=cnpj class="form-control">
                <option>CNPJ</option>
                <?php
                $query = "SELECT * from slv_empresa";
                $selecionar = $conexao->prepare($query);
                $selecionar->execute();
                while ($linhas = $selecionar->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $linhas['empresa_cnpj']; ?>"> <?php echo $linhas['empresa_cnpj']; ?> </option>    
                <?php } ?>
            </select>
            <br><br>
        
        <input type="submit" value="Pesquisar" class="form-control btn btn-estilo">
        <br><br>
        <input type="reset" value="Apagar Campos" class="form-control btn btn-estilo">
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../js/personalizado.js"></script>
    <script src="../js/logout.js"></script>
    <script src="../js/contadorCaractere.js"></script>
    <script src="../js/contadorTelefone.js"></script>
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
            $('[name=telefone]').mask('(00)0000-0000')
            
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
            if ( (charCode == 32 || charCode == 13) ||
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
