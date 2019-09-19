<?php
    try {
        $conexao = new PDO('mysql:host=wmysdes01v;dbname=tresta','tresta','Mass55'); //maquina - banco - usuario - senha 
            echo '';  
        }   
    catch(PDOExeption $e) {
        echo 'Não conectado:'. $e-> getMessage();
        }

         /*try {
        $conexao = new PDO('mysql:host=localhost;dbname=aplicacao','root',''); //maquina - banco - usuario - senha 
            echo '';  
        } 
    catch(PDOExeption $e) {
        echo 'Não conectado:'. $e-> getMessage();
        }*/  
    $conexao->exec('SET CHARACTER SET utf8');
?>