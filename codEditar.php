<?php
require_once 'conexao.php';
session_start();

If (isset($_POST['editar'])) {
    
  
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $celular = $_POST['celular'];
    $logadouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $cep = $_POST['cep'];


    $sql = "UPDATE  Endereco  SET logadouro = '$logadouro',  numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade', uf = '$uf', cep = '$cep' WHERE codigoEndereco =" . $_SESSION["id"];
   $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
       
   $id = mysqli_insert_id($conn);   
    
    $sql1 = "UPDATE  Cliente SET nomeCliente = '$nome', email = '$email', senha = '$senha', cpf = '$cpf', celular = '$celular' WHERE codigoCliente =".$_SESSION["id"];
    $query1 = mysqli_query($conn, $sql1)or die(mysqli_error($conn));
    
    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['success'] = "Sucesso: Atualizado corretamente!";
        header("Location: minhaconta.php");
    } else {
        $_SESSION['erro'] =  "Aviso: Não foi atualizado!";
    }



}