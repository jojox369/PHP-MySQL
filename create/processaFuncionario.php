<?php
session_start();
include("../conexao.php");

    //Recebendo os dados do formulario
$matricula=$_POST['matricula'];
$nome =$_POST['nome'];
$cpf =$_POST['cpf'];
$empresa = $_POST['empresa'];


$sql = "INSERT INTO slv_funcionario(funcionario_matricula ,funcionario_nome, funcionario_cpf,funcionario_empresa_id) VALUES($matricula, '$nome', '$cpf', $empresa)";
$inserir= $conexao->prepare($sql);

if($inserir->execute()){
  $_SESSION['msg'] = "<p style= 'color:green''>Cadastro feito com sucesso!</p>";
}else{
  $_SESSION['msg'] = "<p style= 'color:red'>Erro: Cadastro falhou!</p>";
}


echo $nome. " - " .$matricula.  " - " .$cpf. " - " .$empresa . "<br><br>";
var_dump($inserir);
header("Location: cadastrarFuncionario.php");

?>