<?php
session_start();
include("../conexao.php");

    //Recebendo os dados do formulario
$placa =$_POST['placa'];
$renavam =$_POST['renavam'];
$modelo =$_POST['modelo'];
$empresa_id = $_POST['empresa_id'];

$sql = "INSERT INTO slv_Veiculo(veiculo_renavam, veiculo_modelo,veiculo_placa,veiculo_empresa_id) VALUES($renavam, '$modelo', '$placa', $empresa_id)";

$inserir= $conexao->prepare($sql);
var_dump($inserir);
	if($inserir->execute()){
  $_SESSION['msg'] = "<p style= 'color:green''>Cadastro feito com sucesso!</p>";
}else{
  $_SESSION['msg'] = "<p style= 'color:red'>Erro: Cadastro falhou!</p>";
}
header("Location: cadastrarVeiculo.php");

?>