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
    <title>Atualização de Empresa</title>
</head>
<body>
    <?php  
    include("../includes/menu.php");
  ?> 
  
   
<?php
            //buscando dados do BD
$id = $_GET['id'];
$pg = $_GET['pg'];
$sql = "SELECT * FROM slv_Empresa WHERE empresa_id = $id ";
            //selecionando os registros
$resultado =$conexao->prepare($sql);
$resultado->execute();
$linhasEmpresa = $resultado->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
    <h1 class="text-center"> Atualização de Empresa</h1>
    <form method="post" action="processaEmpresa.php?pg=<?php echo $pg; ?>&id=<?php echo $id?>" class="form-signin">
        <span class="caracteres">NOME: <?php echo 50 -strlen($linhasEmpresa['empresa_nome']); ?></span> caracteres restantes<br>
         <input type="text" name="nome" class="form-text" id="nome" onkeyup="maiuscula(this)" onkeypress="return ApenasLetras(event,this);" maxlength="50"value="<?php if(isset($linhasEmpresa['empresa_nome'])){echo $linhasEmpresa['empresa_nome']; } ?>"><br><br>
         <span class="cnpj">0</span> Restantes <br>
        <input type="text" name="cnpj"  id="cnpj" class="form-control" value="<?php if(isset($linhasEmpresa['empresa_cnpj'])){echo $linhasEmpresa['empresa_cnpj']; }?>"> <br><br>
       
        <input type="text" name="telefone" class="form-control" value="<?php if(isset($linhasEmpresa['empresa_telefone'])){echo $linhasEmpresa['empresa_telefone'];} ?>"><br><br>
        <input type="submit" name="enviarAtualização" value="Atualizar" class="form-control btn btn-estilo"><br><br>
        <input type="reset"  value="Apagar" class="form-control btn btn-estilo"> <br><br>
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
<script src="../js/logout.js"></script>
<script src="../js/contadorCNPJ.js"></script>
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
            $('[name=cnpj]').mask('00.000.000/0000-00');
            
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
