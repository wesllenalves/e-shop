<?php
require_once 'tamplate/head.php';
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
                <h3 class="text-themecolor m-b-0 m-t-0">Adicionar Produtos</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active"><a href="produtos.php">Lista de Produtos</a></li>
                    <li class="breadcrumb-item active">Adicionar</li>
                </ol>
            </div>

        </div>

        <?php
        require_once 'conexao.php';
        $id = $_GET['id'] ;
        $sql = "SELECT * FROM produto as p JOIN fornecedor as f ON p.FKFornecedor = f.  codigoFornecedor WHERE codigoProduto = '$id'";
        $query = mysqli_query($conn, $sql);
        ?>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card">
                            <div class="card-block">

                                <form enctype="multipart/form-data" action="codEditar.php" method="POST"class="form-horizontal form-material">
                                    <?php
                                    while ($exibe = mysqli_fetch_assoc($query)) {

                                        $idProduto = $exibe['codigoProduto'];
                                        $idFornecedor = $exibe['codigoFornecedor'];
                                        $nomeProduto = $exibe['nomeProduto'];
                                        $descricao = $exibe['descricaoProduto'];
                                        $qtdEstoque = $exibe['qtdEstoque'];
                                        $valor = $exibe['valor'];
                                        $nomeFornecedor = $exibe['nomeFornecedor'];
                                        $cnpj = $exibe['cnpj'];
                                        $telefone = $exibe['telefone'];
                                        $email = $exibe['email'];
                                        $fotoProduto = $exibe['fotoProduto'];

                                        ?>
                                    
                                    <h2>Produtos:</h2>                                
                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-md-12">Nome do Produto</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="idProduto" value="<?=$idProduto?>">
                                            <input type="hidden" name="idFornecedor" value="<?=$idFornecedor?>">
                                            <input type="text" name="nomeProduto" value="<?=$nomeProduto?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="descricaoProduto" class="col-md-12">Descrição do Produto</label><br/>
                                        <div class="col-md-12">
                                            <textarea rows="5" cols="110" value="<?=$descricao?>" name="descricaoProduto"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2">Quantidade</label>
                                        <div class="col-md-2">
                                            <input type="number"  name="quantidadeProduto" value="<?=$qtdEstoque?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Valor</label><br/><br/>
                                        <div class="col-md-12">                                            

                                            <label for="dinheiro">R$</label>
                                            <input type="text" id="demo1" name="valor" value="<?=$valor?>" />
                                            <script type="text/javascript">$("#demo1").maskMoney();</script>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2">Imagem do produto</label>
                                        <div class="col-md-12">
                                            <input name="imagem" type="file" value="<?=$fotoProduto?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <br><br>
                                    <h2>Fornecedor:</h2>                                
                                    <br><br><br>

                                    <div class="form-group">
                                        <label class="col-md-12">Nome do Fornecedor</label>
                                        <div class="col-md-12">
                                            <input type="text" name="nomeFornecedor" value="<?=$nomeFornecedor?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cnpjFornecedor" class="col-md-12">CPNJ</label>
                                        <div class="col-md-12">
                                            <input type="text" name="cnpjFornecedor" value="<?=$cnpj?>" class="form-control form-control-line" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Telefone</label>
                                        <div class="col-md-12">
                                            <input type="tel"  name="telefoneFornecedor" value="<?=$telefone?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">E-mail</label>
                                        <div class="col-md-12">
                                            <input type="email" name="emailFornecedor" value="<?=$email?>" class="form-control form-control-line">
                                        </div>
                                    </div>                            
                                    <div>
                                        <input type="submit" name="Editar"  class="btn btn-success" value="Atualizar">
                                    </div>
                                    <?php                                    
                                    }
                                    ?>
                                </form>
                            </div>
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
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<?php
require_once 'tamplate/footer.php';
?>