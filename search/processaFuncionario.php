<?php
session_start();

include("../conexao.php");
$matricula =$_POST['matricula'];
$nome =$_POST['nome'];
$cpf =$_POST['cpf'];

//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
$pg =  (isset($_GET['pg']))? $_GET['pg'] : 1; ;




if($matricula != null){
    $query = "SELECT * FROM slv_funcionario INNER JOIN slv_empresa on empresa_id = funcionario_empresa_id WHERE funcionario_matricula LIKE '%$matricula%'";
}
if($nome != null){
    $query = "SELECT * FROM slv_funcionario INNER JOIN slv_empresa on empresa_id = funcionario_empresa_id WHERE funcionario_nome LIKE '%$nome%'";
}
if($cpf != null){
    $query = "SELECT * FROM slv_funcionario INNER JOIN slv_empresa on empresa_id = funcionario_empresa_id WHERE funcionario_cpf LIKE '%$cpf%'";
}


$resultado =$conexao->prepare($query); 
$resultado->execute();
if($resultado != null){
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../_css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../_css/botoes.css">
    <link rel="stylesheet" type="text/css" href="../_css/tabelas.css">
    <link rel="stylesheet" type="text/css" href="../_css/fundo.css">
    <title>Resultado da Pesquisa</title>
</head>
<body>
    <?php include("../includes/menu.php"); ?>
        <br><br>
        
        <div class="container table-responsive">
            <h1 class="text-center"> Resultado da pesquisa </h1>
            
            <table class="table  table-hover">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th> Matricula</th>
                        <th> Nome </th>
                        <th> CPF </th>
                        <th> Empresa </th>
                        <th> Atualizar </th>
                        <th> Deletar </th>
                    </tr>
                </thead>
                <?php 
                while($linhas = $resultado->fetch(PDO::FETCH_ASSOC)){
                 ?>
                 <tbody>
                    <tr class="text-center">
                        <td> <?php echo $linhas['funcionario_matricula'] ?> </td>
                        <td> <?php echo $linhas['funcionario_nome'] ?> </td>
                        <td> <?php echo $linhas['funcionario_cpf'] ?> </td>
                        <td> <?php echo $linhas['empresa_nome'] ?> </td>
                        <?php $id = $linhas['funcionario_id']; ?>
                        <td> <a
                            href="../update/atualizarFuncionario.php?id=<?php echo $id?>&pg=<?php echo $pg; ?>"
                            class="btn btn-estilo"> Atualizar </a> </td>
                            <td> <a href="../delete/deletarFuncionario.php?id=<?php echo $id?>"
                                class="btn btn-estilo" data-confirm="Tem certeza que deseja excluir o item selecionado?">
                            Deletar </a> </td>
                        </tr>
                    </tbody>
                <?php } ?>
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
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <script src="../js/personalizado.js"></script>
            <script src="../js/logout.js"></script>
        </body>
        </html>
    