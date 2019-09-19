<?php
    session_start();
    include("../conexao.php");
    
    $btnLogin = $_POST['btnLogin'];
    if($btnLogin){
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];

        if((!empty($cpf)) and (!empty($senha))){
            $query = "SELECT id,nome, cpf, senha FROM cadastroadm WHERE cpf = '$cpf' limit 1";
            $comparar = $conexao->prepare($query);
            $comparar->execute();
            
            if($comparar){
                $linhaLogin = $comparar->fetch(PDO::FETCH_ASSOC);
                var_dump($linhasLogin);
                if(password_verify($senha,$linhaLogin['senha'])){
                    $_SESSION['id'] = $linhaLogin['id'];
                    $_SESSION['nome'] = $linhaLogin['nome'];
                    $_SESSION['cpf'] = $linhaLogin['cpf'];
                    header("Location: ../principal.php");
                      
                }else{
                    $_SESSION['msg'] = "<p style= 'color:red'>Login e senha Incorretos!</p>";
                    header("Location: ../index.php");
                }
            }
           
        }else{
            $_SESSION['msg'] = "<p style= 'color:red'>Login e senha Incorretos!</p>";
            header("Location: ../index.php"); 
        } 

    }else{
        $_SESSION['msg'] = "<p style= 'color:red'>Voce precisa estar Logado!</p>";
        header("Location: ../index.php");
    }
 