<?php 
session_start();
include("../conexao.php");

//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
$pg =  (isset($_GET['pg']))? $_GET['pg'] : 1;
//Seta a quantidade de cursos por pagina
$qtd_pagina = 3;
//Calcular o inicio da visualizacao
$inicio = ($qtd_pagina*$pg)-$qtd_pagina;
$listar = "SELECT * FROM slv_veiculo INNER JOIN slv_empresa ON empresa_id = veiculo_empresa_id ORDER BY veiculo_id LIMIT $inicio,$qtd_pagina";
$retorno = $conexao->prepare($listar);
$retorno->execute();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../_css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../_css/botoes.css">
    <link rel="stylesheet" type="text/css" href="../_css/tabelas.css">
    <link rel="stylesheet" type="text/css" href="../_css/fundo.css">
    <title>Veiculos</title>
</head>
<body >
          
   <?php  
    include("../includes/menu.php");
  ?>
   
    <div class="container table-responsive">
        <h1 class="text-center">Lista de Veiculos</h1>
       
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th > Renavam </th>
                    <th > Modelo </th>
                    <th > Placa </th>
                    <th > Empresa  </th>
                    <th > Atualizar </th>
                    <th > Deletar </th>
                </tr>   
            </thead>
            <?php 
            while($linhas = $retorno->fetch(PDO::FETCH_ASSOC)){
             ?>
             <tbody>
                <tr class="text-center">
                    <td > <?php echo $linhas['veiculo_renavam'] ?> </td>
                    <td > <?php echo $linhas['veiculo_modelo'] ?> </td>
                    <td > <?php echo $linhas['veiculo_placa'] ?> </td>
                    <td > <?php echo $linhas['empresa_nome'] ?> </td>
                    <?php $id = $linhas['veiculo_id']; ?>
                    <td > <a
                        href="../update/atualizarVeiculo.php?id=<?php echo $id?>&pg=<?php echo $pg; ?>"
                        class="btn btn-estilo"> Atualizar </a>  </td>
                        <td > <a href="../delete/deletarVeiculo.php?id=<?php echo $id?>"
                            class="btn btn-estilo"
                            data-confirm="Tem certeza que deseja excluir o item selecionado?"> Deletar </a> </td>
                        </tr>
                    <?php } ?>            
                </tbody>    
            </table>
        </div>
        <div class="text-center">
    <a href="../create/cadastrarVeiculo.php" class="btn btn-estilo"> Cadastrar </a>
    <a href="../search/pesquisarVeiculo.php?pg=<?php echo $pg; ?>" class="btn btn-estilo"> Pesquisar </a>
    </div>
    <br><br>
        <br><br>
        <div class="container text-center">
            <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
        </div>
        <div class="container text-center">
            <?php
        //paginação - somar quantidade de itens
            $result_pg = "SELECT COUNT(veiculo_id) AS num_result from slv_Veiculo";
            $resultado_pg=$conexao->prepare($result_pg);
     $resultado_pg->execute();
     $row_pg = $resultado_pg->fetch(PDO::FETCH_ASSOC);
            //quantidade de paginas
            $quantidade_pg = ceil($row_pg['num_result'] / $qtd_pagina);
            //limite de links
            $max_links = 1;
            //primeira pagina
            if($pg > 1){?>
                <a href='listarVeiculo.php?pg=1' class="btn btn-estilo" > << </a> &nbsp;
            <?php }
            //pagina anterior
            $pagina_anterior = $pg - 1;
            if($pagina_anterior != 0){ ?>
                <a href='listarVeiculo.php?pg=<?php echo $pagina_anterior; ?>' class="btn btn-estilo"> < </a> &nbsp;
            <?php } 
            //pagina atual
            echo "$pg"."&nbsp;"; 
            //pagina posterior
            $pagina_posterior = $pg + 1;
            if($pagina_posterior <= $quantidade_pg){ ?>
                <a href='listarVeiculo.php?&pg=<?php echo $pagina_posterior; ?>' class="btn btn-estilo"> > </a>
            <?php }
            //ultima pagina
            if($pg < $quantidade_pg){?>
                <a href='listarVeiculo.php?pg=<?php echo $quantidade_pg; ?>' class="btn btn-estilo"> >> </a> 
            <?php } ?>   
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
        <script src="../js/personalizado.js" ></script>
        <script src="../js/logout.js"></script>
    </body>
    </html>
   