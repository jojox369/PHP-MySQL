<?php
session_start();

include("../conexao.php");	
    //Recebendo os dados do formulario
	$cnpj =$_POST['cnpj'];
	$nome =$_POST['nome'];
	$telefone =$_POST['telefone'];
	$sql = "INSERT INTO slv_empresa(empresa_cnpj, empresa_nome, empresa_telefone) VALUES('$cnpj', '$nome', '$telefone')";
	$inserir= $conexao->prepare($sql);
	if($inserir->execute()){
		$_SESSION['msg'] = "<p style= 'color:green''>Cadastro feito com sucesso!</p>";
	}else{
		$_SESSION['msg'] = "<p style= 'color:red'>Erro: Cadastro falhou!</p>";
	}
	header("Location: cadastrarEmpresa.php");

?>