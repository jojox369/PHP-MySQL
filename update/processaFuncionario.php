<?php
session_start();

include("../conexao.php");
    //Recebendo os dados do formulario
$matricula =$_POST['matricula'];
$nome =$_POST['nome'];
$cpf =$_POST['cpf'];
$cnpj = $_POST['cnpj'];
$pg = $_GET['pg'];



$query = "UPDATE slv_funcionario SET funcionario_matricula=$matricula, funcionario_nome = '$nome', funcionario_cpf = '$cpf' WHERE funcionario_matricula = $matricula";
$atualizar = $conexao->prepare($query);
if($atualizar->execute()){
	$_SESSION['msg'] = "<p style= 'color:green' > Atualização feita com sucesso!</p>";
}else{
	$_SESSION['msg'] = "<p style = 'color:red' > Erro: Atualização falhou!</p>";
}
header("Location: ../read/listarFuncionario.php?pg=".$pg);

  ?>