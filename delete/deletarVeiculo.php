<?php
session_start();
include("../conexao.php");

$id = $_GET['id'];
$query = "DELETE FROM slv_veiculo WHERE veiculo_id = $id ";
$deletar =$conexao->prepare($query);
if($deletar->execute()){
	$_SESSION['msg'] = "<p style= 'color:green' > Veiculo deletado com sucesso!</p>";
}else{
	$_SESSION['msg'] = "<p style = 'color:red' > Erro: Deletar Veiculo falhou!</p>";
}
header("Location: ../read/listarVeiculo.php");
