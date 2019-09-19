<?php 
session_start();

include("../conexao.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../_css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="../_css/fundo.css">
    <link rel="stylesheet" type="text/css" href="../_css/img.css">

	<title>Pagina de Relatorio</title>
</head>
<body>
<?php  
    include("../includes/menu.php");
  ?>	
	<div class="holder galeria">
     <div class="imagem" data-title="Funcionarios">
       <a class="nav-link" href="./selecionarEmpresa.php?id=1" ><img src="../icones/relatorioEF.png"  width="150px" height="150" title="Sera gerado um relatorio contendo as informações de todos os funcionarios e suas respecivas empresas"></a>
   </div>
  
   <div class="imagem" data-title="Veiculos">
       <a class="nav-link" href=" ./selecionarEmpresa.php?id=2"><img src="../icones/relatorioEV.png" width="150px" height="150" title="Sera gerado um relatorio contendo as informações de todos os veiculos e suas respecivas empresas"></a>
   </div> 
        
</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="../js/logout.js"></script>
		
	</body>
	</html>
	