<?php

session_start();

include("../conexao.php");

    //Recebendo os dados do formulario
$cnpj =$_POST['cnpj'];
$nome =$_POST['nome'];
$telefone =$_POST['telefone'];
$pg = $_GET['pg'];
$id = $_GET['id'];
$query=("UPDATE slv_empresa SET empresa_cnpj='$cnpj', empresa_nome = '$nome', empresa_telefone = '$telefone' WHERE empresa_id = $id ");
$atualizar = $conexao->prepare($query);
if($atualizar->execute()){
	$_SESSION['msg'] = "<p style= 'color:green' > Atualização feita com sucesso!</p>";
}else{
	$_SESSION['msg'] = "<p style = 'color:red' > Erro: Atualização falhou!</p>";
}
header("Location: ../read/listarEmpresa.php?pg=".$pg);

  ?>