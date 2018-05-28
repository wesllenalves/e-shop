<?php
session_start();
require_once 'conexao.php';

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
    if(isset($_GET['acao']) == 'up'){
        if(is_array(isset($_POST['prod']))){
            foreach ($_POST['prod'] as $id => $qtd) {
                $id = intval($id);
                $qtd = intval($qtd);
                if(!empty($qtd) || $qtd <> 0 ){
                    $_SESSION['carrinho'][$id] = $qtd;
                }else{
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

        <title>Pé-De-Moleque</title>

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
                            <h2>Pé-DE-Moleque</h2>
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
                                        <li><a href="#"><i class="fa fa-unlock-alt"></i> Sair</a></li>                  
                                    </ul>
                                <?php } ?>
                            <li><a class="text-uppercase" href="login.php">Login</a> / <a class="text-uppercase" href="cadastro.php" >Criar</a></li>

                            </li>
                            <!-- /Account -->

                            

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
                    <!-- category nav -->

                    <!-- /category nav -->

                    <!-- menu nav -->
                    <div class="menu-nav">
                        <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                        <ul class="menu-list">
                            <li><a href="index.php">Home</a></li>
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
                    <li class="active">Meu carrinho</li>
                </ul>
            </div>
        </div>
        <!-- /BREADCRUMB -->

        <!-- section -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">                    
                    <div class="col-md-6">                            
                    </div>                   
                    <div class="col-md-12">
                        <div class="order-summary clearfix">
                            <div class="section-title">
                                <h3 class="title">Revisao do Carrinho</h3>
                            </div>
                            <form action="?acao=up" method="POST"> 
                            <table class="shopping-cart-table table">
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th></th>
                                        <th class="text-center">Preço</th>
                                        <th class="text-center">Quantidade</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-right"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (count($_SESSION['carrinho']) == 0) {

                                        echo '<tr><td>Não há produto No carrinho</td></tr>';
                                    } else {


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



                                            echo '<tr>
                <td class="thumb"><img src="./img/' . $foto . '" alt="" width="100" height="80"></td>
                <td class="details">
                        <a href="#">' . $nomeProduto . '</a>											
                </td>
                <td class="price text-center"><strong>R$: ' . $valor . '</strong><br><del class="font-weak"><small>R$: 500.00</small></del></td>
                <td class="qty text-center"><input class="input" type="number" name="prod[' . $id . ']" value="' . $qtd . '" ></td>
                <td class="total text-center"><strong class="primary-color">R$: ' . $sub . '</strong></td>
                <td class="text-right"><a href="?acao=del&id=' . $id . '"><i class="fa fa-close"></i></a></td>
            </tr>
            </tbody>';
                                
            
                                        }
                                    }
                                    ?>
                            <tfoot>
                                    <tr>
                                        <th class="empty" colspan="4"></th>
                                        <th colspan="2" class"text-center"><input  class="btn btn-primary" type="submit" value="Atualizar carrinho"> </th>
                                    </tr>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>SUBTOTAL</th>
                                        <th colspan="2" class="sub-total">---</th>
                                    </tr>                                    
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>TOTAL</th>
                                        <th colspan="2" class="total">---</th>
                                    </tr>
                                    
                            </tfoot>
                            </table>
                               </form>
                            <div class="pull-right">
                                <a href="index.php"><button class="primary-btn">Voltar as Compras</button></a>
                                <a href="#comprar.php"><button class="primary-btn">Finalizar as compras</button></a>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->

        <!-- FOOTER -->
        <footer id="footer" class="section section-grey">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- footer widget -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="footer">
                            <!-- footer logo -->
                            <div class="footer-logo">
                                <h2>Pé-DE-Moleque</h2>
                            </div>
                            <!-- /footer logo -->

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

                            <!-- footer social -->
                            <ul class="footer-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                            <!-- /footer social -->
                        </div>
                    </div>
                    <!-- /footer widget -->

                    <!-- footer widget -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-header">My Account</h3>
                            <ul class="list-links">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">My Wishlist</a></li>
                                <li><a href="#">Compare</a></li>
                                <li><a href="#">Checkout</a></li>
                                <li><a href="#">Login</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /footer widget -->

                    <div class="clearfix visible-sm visible-xs"></div>

                    <!-- footer widget -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-header">Customer Service</h3>
                            <ul class="list-links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Shiping & Return</a></li>
                                <li><a href="#">Shiping Guide</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /footer widget -->

                    <!-- footer subscribe -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-header">Stay Connected</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                            <form>
                                <div class="form-group">
                                    <input class="input" placeholder="Enter Email Address">
                                </div>
                                <button class="primary-btn">Join Newslatter</button>
                            </form>
                        </div>
                    </div>
                    <!-- /footer subscribe -->
                </div>
                <!-- /row -->
                <hr>
                <!-- row -->
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <!-- footer copyright -->
                        <div class="footer-copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <!-- /footer copyright -->
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </footer>
        <!-- /FOOTER -->

        <!-- jQuery Plugins -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/nouislider.min.js"></script>
        <script src="js/jquery.zoom.min.js"></script>
        <script src="js/main.js"></script>

    </body>

</html>
