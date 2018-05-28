<?php

require_once 'conexao.php';

if(isset($_POST['Submit'])){
    
    $username = $_POST['username'];
    $senha = $_POST['senha'];
    
    $result = mysqli_query($conn, "SELECT * FROM Cliente WHERE email = '$username' AND senha = '$senha'");
    
    if(mysqli_num_rows ($result) > 0 )
    {
       $usuario = mysqli_fetch_assoc($result);
       
        session_start();
    $_SESSION['tipoUsuario'] = $usuario['tipoUsuario'];
    $_SESSION['nome'] = $usuario['nomeCliente'];
    $_SESSION['id'] = $usuario['codigoCliente'];
    $_SESSION['logado'] = 'sim';
    $_SESSION['senha'] = $senha;
    
    if($_SESSION['tipoUsuario'] === "admin"){
         header('Location: admin/admin/index.php');
    }else{
        echo 'comun';
       header('Location:index.php'); 
    }
    
    }
    else{
        session_start();
       $_SESSION['erro'] = 'Não foi possivel fazer login';
       header('Location: login.php');

    }
    
}

