<?php
session_start();
require_once 'conexao.php';

if (isset($_GET['sair']) == 'sim') {
    session_destroy();
    session_unset();
    header("Location: ./index.php");
}


if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

//adicionar produto
if (isset($_GET['acao'])) {

    //adicionar produto
    if ($_GET['acao'] == 'add') {
        $id = intval($_GET['id']);
        if (!isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] = 1;
        } else {
            $_SESSION['carrinho'][$id] += 1;
        }
    }

    //remover carinho
    if ($_GET['acao'] == 'del') {
        $id = intval($_GET['id']);
        if (isset($_SESSION['carrinho'][$id])) {
            session_destroy();
            unset($_SESSION['carrinho'][$id]);
        }
    }

    //atualizar carrinho
    if ($_GET['acao'] == 'up') {
        if (is_array($_POST['prod'])) {
            foreach ($_POST['prod'] as $id => $qtd) {
                $id = intval($id);
                $qtd = intval($qtd);
                if (!empty($qtd) || $qtd <> 0) {
                    $_SESSION['carrinho'][$id] = $qtd;
                } else {
                    unset($_SESSION['carrinho'][$id]);
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>E-SHOP HTML Template</title>

        <!-- Google font -->
        <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

        <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

        <!-- Slick -->
        <link type="text/css" rel="stylesheet" href="css/slick.css" />
        <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

        <!-- nouislider -->
        <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />



        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="css/formulariologin.css">


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->
        <style type="text/css">
            #formulariologin{

                margin-left: 5%;
            }
            #logar{
                margin-left: 30%;
            }
        </style>

    </head>

    <body>
        <!-- HEADER -->
        <header>        

            <!-- header -->
            <div id="header">
                <div class="container">
                    <div class="pull-left">
                        <!-- Logo -->
                        <div class="header-logo">
                            <a class="logo" href="#">
                                <h1>Pé-de-Moleque</h1>
                            </a>
                        </div>
                        <!-- /Logo -->                       
                    </div>
                    <div class="pull-right">
                        <ul class="header-btns">
                            <!-- Account -->
                            <li class="header-account dropdown default-dropdown">
                                <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                    <div class="header-btns-icon">
                                        <i class="fa fa-user-o"></i>
                                    </div>
                                    <?php if (isset($_SESSION['logado']) == "sim") { ?>
                                        <strong class="text-uppercase">Minha Conta <i class="fa fa-caret-down"></i></strong>

                                    </div>
                                    <ul class="custom-menu">
                                        <li><a href="#"><i class="fa fa-user-o"></i> Minha Conta</a></li>
                                        <li><a href="#"><i class="fa fa-heart-o"></i> Lista de Desejos</a></li>			
                                        <li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
                                        <li><a href="?sair=sim"><i class="fa fa-unlock-alt"></i> Sair</a></li>					
                                    </ul>
                                <?php } ?>
                                <?php
                                if (isset($_SESSION['logado']) != 'sim') {
                                    ?>
                                <li><a class="text-uppercase" href="login.php">Login</a> / <a class="text-uppercase" href="cadastro.php" >Criar</a></li>
                                <?php
                            }
                            ?>
                            </li>
                            <!-- /Account -->

                            <!-- Cart -->

                            <?php
                            if (count($_SESSION['carrinho']) == 0) {

                                echo ' 
                                                <li class="header-cart dropdown default-dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                <div class="header-btns-icon">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span class="qty">0</span>
                                                </div>
                                                <strong class="text-uppercase">My Cart:</strong>
                                                <br>                                                
                                                </a>
                                                <div class="custom-menu">
                                                <div id="shopping-cart">
                                                <div class="shopping-cart-list">
                                                    <div class="product product-widget">                                                        
                                                                                                                    
                                                            <h2 class="product-name">Não há produto No carrinho</h2>
                                                                                                               
                                                    </div>
                                                </div>
                                        <div class="shopping-cart-btns">
                                            <button class="main-btn">View Cart</button>
                                            <a href="checkout.php"><button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button></a>
                                        </div>
                                    </div>
                                </div>
                            </li>';
                            } else {
                                ?>                   

                                <li class="header-cart dropdown default-dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <div class="header-btns-icon">
                                            <i class="fa fa-shopping-cart"></i>
                                            <?php $quantidade = count($_SESSION['carrinho']); ?>
                                            <span class="qty"><?= $quantidade ?></span>
                                        </div>
                                        <strong class="text-uppercase">My Cart:</strong>
                                        <br>
                                        <span>35.20$</span>
                                    </a>
                                    <div class="custom-menu">
                                        <div id="shopping-cart">
                                            <div class="shopping-cart-list">                                    


    <?php
    foreach ($_SESSION['carrinho'] as $id => $qtd) {
        

        $sql = "SELECT * FROM produto as p JOIN fornecedor as f ON p.FKFornecedor = f.  codigoFornecedor WHERE codigoProduto = ' $id'";
        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $exibe = mysqli_fetch_assoc($query);

        $codigo = $exibe['codigoProduto'];
        $nomeProduto = $exibe['nomeProduto'];
        $qtdEstoque = $exibe['qtdEstoque'];
        $valor = $exibe['valor'];
        $foto = $exibe['fotoProduto'];
        $sub = $exibe['valor'] * $qtd;

        echo '<div class="product product-widget">
            <div class="product-thumb">
              <img src="./img/' . $foto . '" alt="" width="100" height="80">
             </div>
            <div class="product-body">
                <h3 class="product-price">R$: ' . $valor . '<span class="qty"></span></h3>
                <h2 class="product-name"><a href="#">' . $nomeProduto . '</a></h2>
                 </div>
                <button class="cancel-btn"><a href="?acao=del&id=' . $id . '"><i class="fa fa-trash"></i></a></button>
                </div>                
                 ';
    }
    ?>
                                                <div class="shopping-cart-btns">
                                                    <button class="main-btn">View Cart</button>
                                                    <a href="checkout.php"><button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button></a>
                                                </div>
                                                <?php
                                            }
                                            ?>













                                            <!--                                            <div class="product product-widget">
                                                                                            <div class="product-thumb">
                                                                                                <img src="./img/thumb-product01.jpg" alt="">
                                                                                            </div>
                                                                                            <div class="product-body">
                                                                                                <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                                                                                                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                                                                            </div>
                                                                                            <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                                                                                        </div>-->

                                        </div>
                                    </div>
                            </li>
                            <!-- /Cart -->

                            <!-- Mobile nav toggle-->
                            <li class="nav-toggle">
                                <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                            </li>
                            <!-- / Mobile nav toggle -->
                        </ul>
                    </div>
                </div>
                <!-- header -->
            </div>
            <!-- container -->
        </header>
        <!-- /HEADER -->

        <!-- NAVIGATION -->
        <div id="navigation">
            <!-- container -->
            <div class="container">
                <div id="responsive-nav">


                    <!-- menu nav -->
                    <div class="menu-nav">
                        <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                        <ul class="menu-list">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Shop</a></li>			
                        </ul>
                    </div>
                    <!-- menu nav -->
                </div>
            </div>
            <!-- /container -->
        </div>
        <!-- /NAVIGATION -->
        