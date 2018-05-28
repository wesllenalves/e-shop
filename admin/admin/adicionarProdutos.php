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
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="card">
                            <div class="card-block">
                                
                                <form enctype="multipart/form-data" action="codAdicionarProdutos.php" method="POST"class="form-horizontal form-material">
                                    
                                    <h2>Produtos:</h2>                                
                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-md-12">Nome do Produto</label>
                                        <div class="col-md-12">
                                            <input type="text" name="nomeProduto" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="descricaoProduto" class="col-md-12">Descrição do Produto</label><br/>
                                        <div class="col-md-12">
                                            <textarea rows="5" cols="110" name="descricaoProduto"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2">Quantidade</label>
                                        <div class="col-md-2">
                                            <input type="number"  name="quantidadeProduto" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Valor</label><br/><br/>
                                        <div class="col-md-12">                                            
                                            
                                            <label for="dinheiro">R$</label>
                                            <input type="text" id="demo1" name="valor" value="0.00" />
                                            <script type="text/javascript">$("#demo1").maskMoney();</script>
		
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2">Imagem do produto</label>
                                        <div class="col-md-12">
                                            <input name="imagem" type="file"   value="" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <br><br>
                                    <h2>Fornecedor:</h2>                                
                                    <br><br><br>
                                    
                                    <div class="form-group">
                                        <label class="col-md-12">Nome do Fornecedor</label>
                                        <div class="col-md-12">
                                            <input type="text" name="nomeFornecedor" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cnpjFornecedor" class="col-md-12">CPNJ</label>
                                        <div class="col-md-12">
                                            <input type="text" name="cnpjFornecedor" class="form-control form-control-line" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Telefone</label>
                                        <div class="col-md-12">
                                            <input type="tel"  name="telefoneFornecedor" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">E-mail</label>
                                        <div class="col-md-12">
                                            <input type="email" name="emailFornecedor" class="form-control form-control-line">
                                        </div>
                                    </div>                            
                                        <div>
                                            <input type="submit" name="Cadastrar" class="btn btn-success" value="Cadastrar">
                                        </div>
                                    
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