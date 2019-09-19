<?php
session_start();

include("../conexao.php");
if($cnpj = $_POST['cnpj'] != "CNPJ"){
    $cnpj = $_POST['cnpj'];
}else{
    $cnpj = null;
}
$nome =$_POST['nome'];
$telefone =$_POST['telefone'];
$pg = $_GET['pg'];
$qtd_pagina = 3;
$inicio = ($qtd_pagina * $pg) - $qtd_pagina;
if($cnpj != null){
    $query = "SELECT * FROM slv_empresa WHERE empresa_cnpj LIKE '%$cnpj%'";
}
if($nome != null){
    $query = "SELECT * FROM slv_empresa WHERE empresa_nome LIKE '%$nome%'";
}
if($telefone != null){
    $query = "SELECT * FROM slv_empresa WHERE empresa_telefone LIKE '%$telefone%' ";
}
$resultado =$conexao->prepare($query); 
if($resultado->execute()){
    if($contar = $resultado->rowCount() > 0){
        $_SESSION['msg'] = "<p style = 'color:green;'>Pesquisa realizada com sucesso!</p>";
        }else{
            $_SESSION['msg'] = "<p style = 'color:red;'>Não foi possivel localizar registros!</p>";
        }
}else{
    $_SESSION['msg'] = "<p style = 'color:red;'>Pesquisa Falhou!</p>";
}
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
    <title>Resultado Pesquisa</title>
</head>
<body>
     <?php include("../includes/menu.php"); ?>
        <div class="container table-responsive"> 
           <h1 class="text-center"> Resultado da pesquisa </h1>
           <table class="table  table-hover">
            <thead class="thead-dark"> 
            <tr class="text-center">
               
                <th > CNPJ </th>
                <th > Nome </th>
                <th > Telefone </th>
                <th > Atualizar </th>
                <th > Deletar </th>
           
        </tr> 
         </thead>    
        <?php 
        while($linhas = $resultado->fetch(PDO::FETCH_ASSOC)){
         ?>
         <tbody>
            <tr class="text-center">
                <td > <?php echo $linhas['empresa_cnpj'] ?> </td>
                <td > <?php echo $linhas['empresa_nome'] ?> </td>
                <td > <?php echo $linhas['empresa_telefone'] ?> </td>
                <?php $id = $linhas['empresa_cnpj']; ?>
                <td > <a href="../update/atualizarEmpresa.php?id=<?php echo $id?>&pg=<?php echo $pg; ?>" class="btn btn-estilo"> Atualizar </a> </td>
                <td > <a href="../delete/deletarEmpresa.php?id=<?php echo $id?>" class="btn btn-estilo" data-confirm="Tem certeza que deseja excluir o item selecionado?" > Deletar  </a> </td>
            </tr>
        <?php } ?>  
    </tbody>          
</table>
<div class="container text-center">
    <?php 
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    } else{
        $_SESSION['msg'] = "";
    }?>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="../js/personalizado.js"></script>
</body>
</html>
