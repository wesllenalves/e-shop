<?php
require_once 'tamplate/head.php';
?>

<!-- NAVIGATION -->
<div id="navigation">
    <!-- container -->
    <div class="container">
        <div id="responsive-nav">


            <!-- menu nav -->
            <div class="menu-nav">
                <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                <ul class="menu-list">
                    <li><a href="index">Home</a></li>
                    <li><a href="#">Shop</a></li>			
                </ul>
            </div>
            <!-- menu nav -->
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /NAVIGATION -->

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Cadastro</li>
        </ul>
    </div>
</div>

<!--Conteudo -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div id="formulariocadastro">
                <form action="codCadastro.php" method="POST">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Nome Completo</label>
                            <input type="text" class="form-control" name="nome" id="exampleInputEmail1" placeholder="Digite o valor">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="InputEmail">E-mail</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Digite o valor">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="InputSenha">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite o valor">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="InputCPF">CPF</label>
                            <input type="number" class="form-control" name="cpf" id="cpf" placeholder="Digite o valor">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="InputCelular">Celular</label>
                            <input type="celular" class="form-control" name="celular" id="celular" placeholder="Digite o valor">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="InputLougradouro">Lograduro</label>
                            <input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Digite o valor">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="InputNumero">Numero</label>
                            <input type="number" class="form-control" name="numero" id="numero" placeholder="Digite o valor">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="InputComplemento">Complemento</label>
                            <input type="text" class="form-control" name="complemento" id="complemento" placeholder="Digite o valor">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="InputBairro">Bairro</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Digite o valor">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="InputCidade">Cidade</label>
                            <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Digite o valor">
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-md-1">
                            <label for="InputUF">UF</label>
                            <input type="text" class="form-control" name="uf" id="uf" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="InputCEP">CEP</label>
                            <input type="number" class="form-control" name="cep" id="cep">
                        </div>

                    </div>

                    <hr />

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
                            <a href="template.html" class="btn btn-default">Cancelar</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!--Conteudo -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">


            <!-- MAIN -->
            <div id="main" class="col-md-12">


            </div>
            <!-- /MAIN -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<?php
require_once 'tamplate/footer.php';
?>