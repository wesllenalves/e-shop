<?php
require_once 'tamplate/head.php';
require_once 'conexao.php';

if(isset($_GET['remover'])){
    
    $id = $_GET['remover'];
    $sql1 = "DELETE FROM fornecedor WHERE codigoFornecedor = $id";
    $query1 = mysqli_query($conn, $sql);
    
    $sql = "DELETE FROM produto WHERE codigoProduto = $id";
    $query = mysqli_query($conn, $sql);
}

?>
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Listar Produtos</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Produtos</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <a href="adicionarProdutos.php" class="btn pull-right hidden-sm-down btn-success"> Adicionar Produtos</a>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <?php
                            
                            if (isset($_SESSION['success'])) {
                                ?>
                                <p id="alerta" class="text-center alert alert-success"><?= $_SESSION['success'] ?></p> 
                                <?php
                                unset($_SESSION['success']);
                            }
                            ?>

                            <?php
                

                    $sql = "SELECT * FROM produto as p JOIN fornecedor as f ON p.FKFornecedor = f.  codigoFornecedor";
                 $query = mysqli_query($conn, $sql);

                 

                ?>
                            <div class="card-block">
                                <h4 class="card-title">Basic Table</h4>                                
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nome do Produto</th>
                                                <th>Quantidade</th>
                                                <th>Valor do Produto</th>
                                                <th>Fornecedor</th>
                                                <th>CNP do Fornecedor</th>
                                                <th>Telefone do Fornecedor</th>
                                                <th>E-mail do Fornecedor</th>
                                                <th></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            while ($exibe = mysqli_fetch_assoc($query) ) {

                                                $codigo = $exibe['codigoProduto'];
                                                $nomeProduto = $exibe['nomeProduto'];
                                                $qtdEstoque = $exibe['qtdEstoque'];
                                                $valor = $exibe['valor'];
                                                $nomeFornecedor = $exibe['nomeFornecedor'];
                                                $cnpj = $exibe['cnpj'];
                                                $telefone = $exibe['telefone'];
                                                $email = $exibe['email'];

                                            echo '<tr>
                                                <td>'.$codigo.'</td>
                                                <td>'.$nomeProduto.'</td>
                                                <td>'.$qtdEstoque.'</td>
                                                <td>'.$valor.'</td>
                                                <td>'.$nomeFornecedor.'</td>
                                                <td>'.$cnpj.'</td>
                                                <td>'.$telefone.'</td>
                                                <td>'.$email.'</td>
                                                <td><a href="editar.php?id='.$codigo.'">Editar<a> <a href="?remover='.$codigo.'">Remover<a></td>
                                            </tr>';
                 }



                                            ?>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                © 2017 Monster Admin by wrappixel.com
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <?php
require_once 'tamplate/footer.php';
?>