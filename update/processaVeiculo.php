<?php
session_start();

include("../conexao.php");
    //Recebendo os dados do formulario
$renavam =$_POST['renavam'];
$modelo =$_POST['modelo'];
$cnpj =$_POST['cnpj'];
$placa =$_POST['placa'];
$pg = $_GET['pg'];

$query="UPDATE slv_veiculo SET veiculo_renavam = $renavam, veiculo_modelo = '$modelo', veiculo_placa = '$placa' WHERE veiculo_renavam = $renavam";
$atualizar = $conexao->prepare($query);
if($atualizar->execute()){
	$_SESSION['msg'] = "<p style= 'color:green' > Atualização feita com sucesso!</p>";
}else{
	$_SESSION['msg'] = "<p style = 'color:red' > Erro: Atualização falhou!</p>";
}
header("Location: ../read/listarVeiculo.php?pg=".$pg);
