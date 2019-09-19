<?php 
include("../conexao.php");
$id = $_GET['id'];
if($id == 1 ){
	$redireciona = "processaEF.php";
}elseif($id == 2 ){
	$redireciona = "processaEV.php";
}
$query = "SELECT * FROM slv_empresa ";
$executa = $conexao->prepare($query);
$executa->execute();
?>
<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	  <link rel="stylesheet" type="text/css" href="../_css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../_css/botoes.css">
    <link rel="stylesheet" type="text/css" href="../_css/formulario.css">
    <link rel="stylesheet" type="text/css" href="../_css/fundo.css">
	<title>Selecionar Empresa para Relatorio</title>
</head>
<body>
	<?php include("../includes/menu.php"); ?>
	<h1 class="text-center"> Selecione a empresa </h1>
	<div class="container text-center">
	<form method="post" action="<?php echo $redireciona; ?>" class="form-signin" id="campo">
		<select name="empresa" class="form-control"> 
                <option value=0>Empresa</option>
		<?php while($linhas = $executa->fetch(PDO::FETCH_ASSOC)) { ?>
		<option value="<?php echo $linhas['empresa_id']; ?>"> <?php echo $linhas['empresa_nome']; ?> </option>    
                <?php } ?>
            </select>
            <br><br>
            <input type="submit" value="Enviar" class="form-control btn btn-estilo">
	</form>
</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>