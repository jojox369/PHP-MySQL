<?php 
session_start();
unset($_SESSION['id'],
$_SESSION['nome'],
$_SESSION['cpf']);

$_SESSION['msg'] = "<p style='color:green'> Usuario deslogado com sucesso!</p>";
header("Location: ../index.php");

?>