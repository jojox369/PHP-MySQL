<?php
session_start();

include("../conexao.php");
$empresa= $_POST['empresa'];
if($empresa == 0){
  $query = "SELECT * FROM slv_veiculo INNER JOIN slv_empresa ON veiculo_empresa_id = empresa_id ORDER BY empresa_nome";
}
else{
  $query = "SELECT * FROM slv_veiculo INNER JOIN slv_empresa ON veiculo_empresa_id = empresa_id WHERE empresa_id = $empresa ORDER BY empresa_nome " ;
}
$join = $conexao->prepare($query);
$join->execute();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset = "UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../_css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../_css/fundo.css">
  <link rel="stylesheet" type="text/css" href="../_css/botoes.css">
  <link rel="stylesheet" type="text/css" href="../_css/relatorio.css">
  <title>Relatorio</title>
</head>
<body >

 
  <?php  
    include("../includes/menu.php");
  ?>
<br><br>
<div>
			<h3>Relatorio de Veiculos</h3><br>
            <table class="table  table-hover">
        <thead class="thead-dark">
          <tr class="text-center">
            
            <th> Nome </th>
            <th> CNPJ </th>
            <th> Telefone </th>
            <th> Modelo </th>
            <th> Renavam </th>
            <th> Placa </th>
          </tr>   
        </thead>
        <?php 
         while($empresas = $join->fetch(PDO::FETCH_ASSOC)){
         ?>
         <tbody >
          <tr class="text-center">
             <td> <?php echo $empresas['empresa_nome'] ?> </td>
            <td> <?php echo $empresas['empresa_cnpj'] ?> </td>
            <td> <?php echo $empresas['empresa_telefone'] ?> </td>
            <td> <?php echo $empresas['veiculo_modelo'] ?> </td>
            <td> <?php echo $empresas['veiculo_renavam'] ?> </td>
            <td> <?php echo $empresas['veiculo_placa'] ?> </td>
            </tr>
        <?php } ?>            
      </tbody>
    </table>
            
			</div>
			 
         
    </body>
</html>
