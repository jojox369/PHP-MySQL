<?php
session_start();

include("../conexao.php");
$pg = $_GET['pg'];
$placa =$_POST['placa'];
$renavam =$_POST['renavam'];
$modelo =$_POST['modelo'];




if($modelo != null){
    $query = "SELECT * FROM slv_Veiculo INNER JOIN slv_empresa ON empresa_id = veiculo_empresa_id WHERE veiculo_modelo LIKE '%$modelo%' ";
}
if($placa != null){
    $query = "SELECT * FROM slv_Veiculo INNER JOIN slv_empresa ON empresa_id = veiculo_empresa_idWHERE veiculo_placa LIKE '%$placa%' ";
}
if($renavam != null){
    $query = "SELECT * FROM slv_Veiculo INNER JOIN slv_empresa ON empresa_id = veiculo_empresa_idWHERE veiculo_renavam LIKE '%$renavam%' ";
}

$resultado =$conexao->prepare($query); 
if($resultado->execute()){
    if($contar = $resultado->rowCount() > 0){
        $_SESSION['msg'] = "<p style = 'color:green;'>Pesquisa realizada com sucesso!</p>";
        }else{
            $_SESSION['msg'] = "<p style = 'color:red;'>Não foi possivel localizar registros!</p>";
        }
}else{
    $_SESSION['msg'] = "<p style = 'color:red;'>Pesquisa Falhou!</p>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../_css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../_css/botoes.css">
    <link rel="stylesheet" type="text/css" href="../_css/fundo.css">
    <title>Resultado da Pesquisa</title>
</head>
<body>
 <?php include("../includes/menu.php"); ?>
<br><br>
        <div class="container">
            <h1 class="text-center"> Resultado da pesquisa </h1>
            <table class="table  table-hover">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th> Renavam </th>
                        <th> Modelo </th>
                        <th> Placa </th>
                        <th> Empresa  </th>
                        <th> Atualizar </th>
                        <th> Deletar </th>
                    </tr>
                </thead>
                <?php 
                while($linhas = $resultado->fetch(PDO::FETCH_ASSOC)){
                 ?>
                 <tbody>
                    <tr class="text-center">
                        <td> <?php echo $linhas['veiculo_renavam'] ?> </td>
                        <td> <?php echo $linhas['veiculo_modelo'] ?> </td>
                        <td> <?php echo $linhas['veiculo_placa'] ?> </td>
                        <td> <?php echo $linhas['empresa_nome'] ?> </td>
                        <?php $modelo = $linhas['veiculo_id']; ?>
                        <td > <a
                            href="../update/atualizarVeiculo.php?id=<?php echo $modelo;?>&pg=<?php echo $pg; ?>"
                            class="btn btn-estilo"> Atualizar </a> </td>
                            <td > <a href="../delete/deletarVeiculo.php?id=<?php echo $modelo?>"
                                class="btn btn-estilo" data-confirm="Tem certeza que deseja excluir o item selecionado?">
                            Deletar </a> </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="container text-center">
                <?php 
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                } else{
                    $_SESSION['msg'] = "";
                }?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="../js/personalizado.js"></script>
    </body>
    </html>
    