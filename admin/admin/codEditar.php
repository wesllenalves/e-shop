<?php

require_once 'conexao.php';
session_start();


If (isset($_POST['Editar'])) {


    $nomeProduto = $_POST['nomeProduto'];
    $descricaoProduto = $_POST['descricaoProduto'];
    $quantidadeProduto = $_POST['quantidadeProduto'];
    $valor = $_POST['valor'];
    $nomeFornecedor = $_POST['nomeFornecedor'];
    $cnpjFornecedor = $_POST['cnpjFornecedor'];
    $telefoneFornecedor = $_POST['telefoneFornecedor'];
    $emailFornecedor = $_POST['emailFornecedor'];
    $idFornecedor = $_POST['idFornecedor'];
    $idProduto = $_POST['idProduto'];
    $arquivo = $_FILES['imagem'];
    
    date_default_timezone_set('America/Sao_Paulo'); 
    $date = date("Y-m-d H:i:s");
    
//    if(){
//        echo 'vazia';
//    }else{
//        echo 'não';
//    }

    if (!empty($_FILES['imagem']['size']) >0) {
        $_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');
        //Tamanho máximo do arquivo em Bytes
        $_UP['tamanho'] = 1024 * 1024 * 100; //5mb
        // Faz a verificação da extensao do arquivo			
        $extensao = @strtolower(end(explode('.', $_FILES['imagem']['name'])));

        $novo_nome = md5(time()) . "." . $extensao;
        $diretorio = "../../img/produtos/";

        if (array_search($extensao, $_UP['extensoes']) === false) {

            echo "A imagem não foi cadastrada extesão inválida.";
        } else if ($_UP['tamanho'] < $_FILES['imagem']['size']) {
            echo "Arquivo muito grande.";
        } else {
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome)) {
                 
                $sql = "UPDATE  Fornecedor  SET cnpj = '$cnpjFornecedor', nomeFornecedor = '$nomeFornecedor',  telefone = '$telefoneFornecedor', email = '$emailFornecedor', DataModificado = '$date'  WHERE codigoFornecedor = '$idFornecedor'";

                $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                $sql1 = "UPDATE  Produto SET nomeProduto = '$nomeProduto', descricaoProduto = '$descricaoProduto', qtdEstoque = '$quantidadeProduto',"
                        . " valor = '$valor', fotoProduto = '$novo_nome', DataModificado = '$date' WHERE codigoProduto = '$idProduto'";
                

                $query1 = mysqli_query($conn, $sql1)or die(mysqli_error($conn));

                if (mysqli_affected_rows($conn) > 0) {
                    $_SESSION['success'] = "Sucesso: Atualizado corretamente!";
                    header("Location: produtos.php");
                } else {
                    $_SESSION['erro'] = "Aviso: Não foi atualizado!";
                    header("Location: produtos.php");
                }
            } else {
                echo 'algo deu errado';
            }
        }
    } else {
        $sql = "UPDATE  Fornecedor  SET cnpj = '$cnpjFornecedor', nomeFornecedor = '$nomeFornecedor',  telefone = '$telefoneFornecedor', email = '$emailFornecedor', DataModificado = '$date' WHERE codigoFornecedor = '$idFornecedor'";

        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $sql1 = "UPDATE  Produto SET nomeProduto = '$nomeProduto', descricaoProduto = '$descricaoProduto', qtdEstoque = '$quantidadeProduto',"
                . " valor = '$valor', DataModificado = '$date'  WHERE codigoProduto = '$idProduto'";
        
        $query1 = mysqli_query($conn, $sql1)or die(mysqli_error($conn));

        if (mysqli_affected_rows($conn) > 0) {
            $_SESSION['success'] = "Sucesso: Atualizado corretamente!";
            header("Location: produtos.php");
        } else {
            $_SESSION['erro'] = "Aviso: Não foi atualizado!";
            header("Location: produtos.php");
        }
    }
}



