<?php

session_start();
include("../conexao.php");
    //Recebendo os dados do formulario
    
$nome =$_POST['nome'];
$cpf =$_POST['cpf'];
$senha = $_POST['senha'];
$senhaCrip = password_hash($senha,PASSWORD_DEFAULT);
$sql = "INSERT INTO cadastroadm (nome,cpf,senha) VALUES('$nome', '$cpf', '$senhaCrip')";
$inserir= $conexao->prepare($sql);
echo $sql;
if($inserir->execute()){
  $_SESSION['msg'] = "<p style= 'color:green''>Cadastro feito com sucesso!</p>";
}else{
  $_SESSION['msg'] = "<p style= 'color:red'>Erro: Cadastro falhou!</p>";
}
header("Location: cadastroADM.php");

