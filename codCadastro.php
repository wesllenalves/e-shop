<?php
require_once 'conexao.php';
if(isset($_POST['cadastrar'])){
    
    
    
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
    $tipoUusuario = "comun";
    
    
    mysqli_query($conn, "INSERT INTO endereco (codigoEndereco, logadouro, numero, complemento, bairro, cidade, uf, cep) VALUES (NULL, '$logadouro', '$numero', '$complemento', '$bairro', '$cidade', '$uf', '$cep')");
   
    $id = mysqli_insert_id($conn);   
    
    $sql1 = "INSERT INTO cliente(nomeCliente, email, tipoUsuario, senha, cpf, celular, FKEndereco) values ('$nome', '$email', '$tipoUusuario', '$senha', '$cpf', '$celular', '$id')";
    $query1 = mysqli_query($conn, $sql1)or die(mysqli_error($conn));
    
    if($query1){
        session_start();
        $_SESSION['Cadastro'] = "cadastrado com sucesso";
        header("Location: index.php");
    }
    
    
    



  
 

    
    
    
mysqli_close($conn);
}