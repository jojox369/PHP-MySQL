<?php
session_start();
include("../conexao.php");

$id = $_GET['id'];
$query = "DELETE FROM slv_empresa WHERE empresa_id = $id ";
$deletar =$conexao->prepare($query);
if($deletar->execute()){
	$_SESSION['msg'] = "<p style= 'color:green' > Empresa deletada com sucesso!</p>";
}else{
	$_SESSION['msg'] = "<p style = 'color:red' > Erro: Deletar Empresa falhou! Entre em contato com o administrado</p>";
}
header("Location: ../read/listarEmpresa.php");

  ?>