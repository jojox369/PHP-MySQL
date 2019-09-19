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
    <title>Atualização de Funcionario</title>
</head>
<body> <?php  
    include("../includes/menu.php");
  ?>
<?php
            //buscando dados do BD
$id = $_GET['id'];
$pg = $_GET['pg'];
$sql = "SELECT * FROM slv_funcionario INNER JOIN slv_empresa ON empresa_id = funcionario_empresa_id WHERE funcionario_id = '$id' ";
            //selecionando os registros
$resultado =$conexao->prepare($sql);
$resultado->execute();
$linhasFuncionario = $resultado->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h1 class="text-center"> Atualização de Funcionario</h1>
   
    <form method="post" action="processaFuncionario.php?pg=<?php echo $pg; ?>" class="form-signin">
        Nome:
        <span class="caracteres"><?php echo 50 -strlen($linhasFuncionario['funcionario_nome']); ?></span> caracteres restantes<br>
        <input type="text" name="nome" id="nome" class="form-text"  onkeyup="maiuscula(this)" onkeypress="return ApenasLetras(event,this);" maxlength="50" value="<?php if(isset($linhasFuncionario['funcionario_nome'])){echo $linhasFuncionario['funcionario_nome']; } ?>"><br>

        Matricula: <span class="numeros">0</span> numeros restantes
        <input type="text" name="matricula" id="matricula"  class="form-control" value="<?php if(isset($linhasFuncionario['funcionario_matricula'])){echo $linhasFuncionario['funcionario_matricula']; }?>"> <br>
        
        CPF: 
        <input type="text" name="cpf" class="form-control" value="<?php if(isset($linhasFuncionario['funcionario_cpf'])){echo $linhasFuncionario['funcionario_cpf'];} ?>"><br>
        Empresa: <br> 
        <output><?php if(isset($linhasFuncionario['empresa_nome'])){echo $linhasFuncionario['empresa_nome'];} ?> </output> <br><br>

        <input type="submit" name="enviarAtualização" value="Atualizar" class="form-control btn btn-estilo"><br><br>
        <input type="reset" name="enviarAtualização" value="Apagar Campos" class="form-control btn btn-estilo"> <br><br>
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
    <script src="../js/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[name=cpf]').mask('000.000.000-00');
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
        if ( charCode == 32 ||
            (charCode > 64 && charCode < 91) || 
            (charCode > 96 && charCode < 123) ||
            (charCode > 191 && charCode <= 255) // letras com acentos
            ){
            return true;
    } else {
        alert("Apenas Letras");
        return false;
    }
} catch (err) {
    alert(err.Description);
}
}
</script>
<script type="text/javascript">
    $(document).on("input", "#nome", function () {
    var limite = 50;
    var caracteresDigitados = <?php if(isset($linhasFuncionario['nome'])){echo $linhasFuncionario['nome'];} ?>.lenght;
    var caracteresRestantes = limite - caracteresDigitados;
    $(".caracteres").text(caracteresRestantes);
});
    </script>
   
</body>
</html>
<?php 