<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
require_once 'conexao.php';

if (isset($_POST['Cadastrar'])) {


    $nomeProduto = $_POST['nomeProduto'];
    $descricaoProduto = $_POST['descricaoProduto'];
    $quantidadeProduto = $_POST['quantidadeProduto'];
    $valor = $_POST['valor'];
    $arquivo = $_FILES['imagem'];
    $nomeFornecedor = $_POST['nomeFornecedor'];
    $cnpjFornecedor = $_POST['cnpjFornecedor'];
    $telefoneFornecedor = $_POST['telefoneFornecedor'];
    $emailFornecedor = $_POST['emailFornecedor'];



    

    $_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');
    //Tamanho máximo do arquivo em Bytes
    $_UP['tamanho'] = 1024 * 1024 * 100; //5mb
    // Faz a verificação da extensao do arquivo			
    $extensao = strtolower(end(explode('.', $_FILES['imagem']['name'])));

    $novo_nome = md5(time()) . "." . $extensao;
    $diretorio = "../../img/produtos/";

    if (array_search($extensao, $_UP['extensoes']) === false) {

        echo "A imagem não foi cadastrada extesão inválida.";
    } else if ($_UP['tamanho'] < $_FILES['imagem']['size']) {
        echo "Arquivo muito grande.";
    } else {
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome)) {
            
            $sql =  "INSERT INTO fornecedor (cnpj, nomeFornecedor, telefone, email) VALUES ('$cnpjFornecedor', '$nomeFornecedor', '$telefoneFornecedor', '$emailFornecedor')";
            $query = mysqli_query($conn, $sql);
            
            
            $id = mysqli_insert_id($conn);
            
            echo $sql1 = "INSERT INTO produto (nomeProduto, descricaoProduto, qtdEstoque, valor, fotoProduto, FKFornecedor) values ('$nomeProduto', '$descricaoProduto', '$quantidadeProduto', '$valor', '$novo_nome', '$id')";
            
            $query1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
            if($query1){
                session_start();
                $_SESSION['success'] = "cadastrado com sucesso";
                header("Location: produtos.php");
            }
        } else {
            echo 'algo deu errado';
        }
    }





//    $arquivo 	= $_FILES['arquivo']['name'];
//			
//			//Pasta onde o arquivo vai ser salvo
//			$_UP['pasta'] = '../../img/produtos/sapatos/';
//			
//			//Tamanho máximo do arquivo em Bytes
//			$_UP['tamanho'] = 1024*1024*100; //5mb
//			
//			//Array com a extensões permitidas
//			$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');
//			
//			//Renomeiar
//			$_UP['renomeia'] = false;
//			
//			//Array com os tipos de erros de upload do PHP
//			$_UP['erros'][0] = 'Não houve erro';
//			$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
//			$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
//			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
//			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
//			
//			//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
//			if($_FILES['arquivo']['error'] != 0){
//				die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
//				exit; //Para a execução do script
//			}
//			
//			//Faz a verificação da extensao do arquivo
//			$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
//			if(array_search($extensao, $_UP['extensoes'])=== false){		
//				echo "
//					<META HTTP-EQUIV=REFRESH CONTENT = '0;'>
//					<script type=\"text/javascript\">
//						alert(\"A imagem não foi cadastrada extesão inválida.\");
//					</script>
//				";
//			}
//			
//			//Faz a verificação do tamanho do arquivo
//			else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
//				echo "
//					<META HTTP-EQUIV=REFRESH CONTENT = '0;'>
//					<script type=\"text/javascript\">
//						alert(\"Arquivo muito grande.\");
//					</script>
//				";
//			}
//			
//			//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
//			else{
//				//Primeiro verifica se deve trocar o nome do arquivo
//				if($UP['renomeia'] == true){
//					//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
//					$nome_final = time().'.jpg';
//				}else{
//					//mantem o nome original do arquivo
//					$nome_final = $_FILES['arquivo']['name'];
//				}
//				//Verificar se é possivel mover o arquivo para a pasta escolhida
//				if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
//					//Upload efetuado com sucesso, exibe a mensagem
////					$query = mysqli_query($conn, "INSERT INTO produto (
////					fotoProduto) VALUES('$nome_final')");
//                                        
//                                        $sql1 = "INSERT INTO produto(nomeProduto, descricaoProduto, qtdEstoque, valor, fotoProduto, FKFornecedor) values ('$nomeProduto', '$descricaoProduto', '$quantidadeProduto', '$valor', '$nome_final', '$id')";
//                                        $query1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
//					echo "
//						<META HTTP-EQUIV=REFRESH CONTENT = '0;'>
//						<script type=\"text/javascript\">
//							alert(\"Imagem cadastrada com Sucesso.\");
//						</script>
//					";	
//				}else{
//					//Upload não efetuado com sucesso, exibe a mensagem
//					echo "
//						<META HTTP-EQUIV=REFRESH CONTENT = '0;'>
//						<script type=\"text/javascript\">
//							alert(\"Imagem não foi cadastrada com Sucesso.\");
//						</script>
//					";
//				}
//			}
//                        
//                        if($query1){
//        session_start();
//        $_SESSION['success'] = "cadastrado com sucesso";
//        //header("Location: produtos.php");
//    }
}