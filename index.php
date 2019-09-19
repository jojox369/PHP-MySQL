<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" type="text/css" href="_css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="_css/fundo.css">
    <link rel="stylesheet" type="text/css" href="_css/img.css">
    <title>Acesso ao banco de dados</title>
</head>
<body>
         <nav class="navbar  navbar-light  bg-dark">
        <div class="text-light" style="text-align:right;">
            <script type="text/javascript" src="js/data.js"></script>
        </div>

        <ul class="nav justify-content-end ">
        <li class="nav-item">
          <a class="text-light nav-link " href="login/sair.php" title="Encerrar Sessão" logout-confirm="Tem certeza que deseja excluir o item selecionado?"> Sair </a>
        </li>
        </ul>
        <div class="text-light">
            <label ID="Clock">00:00:00</label>
            <script type="text/javascript" src="js/hora.js"></script>
        </div>
    </nav>     
  
    <!-- Menu -->
    <div class="holder galeria">
     <div class="imagem" data-title="Funcionarios">
       <a class="nav-link" href="read/listarFuncionario.php" ><img src="icones/Funcionario.png"  width="150px" height="150" title="Lista de Funcionarios"></a>
   </div>
   <div class="imagem" data-title="Empresas">
       <a class="nav-link" href="read/listarEmpresa.php"><img src="icones/Empresa.png" width="150px" height="150" title="Lista de Empresas"></a>
   </div>
   <div class="imagem" data-title="Veiculos">
       <a class="nav-link" href=" read/listarVeiculo.php"><img src="icones/Veiculo.png" width="150px" height="150" title="Lista de Veiculos"></a>
   </div> 
    <div class="imagem" data-title="Relatorio">
       <a class="nav-link" href=" relatorio/selecionarCampos.php"><img src="icones/relatorio.png" width="150px" height="150" title="Gerar Relatorio"></a>
   </div>    
</div>
<!--Fim do menu-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="js/logout.js"></script>
</body>
</html>

