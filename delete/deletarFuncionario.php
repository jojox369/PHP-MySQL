<?php
session_start();
include("../conexao.php");

$id = $_GET['id'];
$query = "DELETE FROM slv_funcionario WHERE funcionario_id = $id";
$deletar =$conexao->prepare($query);
if($deletar->execute()){
	$_SESSION['msg'] = "<p style= 'color:green' > Funcionario deletado com sucesso!</p>";
}else{
	$_SESSION['msg'] = "<p style = 'color:red' > Erro: Deletar Funcionario falhou!</p>";
}
header("Location: ../read/listarFuncionario.php");

  ?>