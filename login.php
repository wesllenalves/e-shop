<?php
session_start();
if (isset($_SESSION['logado']) == "sim") {
    header("Location: index.php");
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
                                        <li><a href="#"><i class="fa fa-unlock-alt"></i> Sair</a></li>                  
                                    </ul>
                                <?php } ?>
                            <li><a class="text-uppercase" href="login.php">Login</a> / <a class="text-uppercase" href="cadastro.php" >Criar</a></li>

                            </li>
                            <!-- /Account -->

                            <!-- Cart -->
                            <li class="header-cart dropdown default-dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <div class="header-btns-icon">
                                        <i class="fa fa-shopping-cart"></i>
                                        
                                    </div>
                                    <li><a class="text-uppercase" href="checkout.php">Meu carrinho</a>
                                </a>                                
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
                    <li class="active">Login</li>
                </ul>
            </div>
        </div>

        <!--Conteudo -->
        <div class="container">
            <div class="row">

                <div id="formulariologin">
                    <div class="col-md-5 col-md-offset-3">
                        <div class="wrapper">
                            <?php
                            
                            if (isset($_SESSION['erro'])) {
                                ?>
                                <p id="alerta" class="text-center alert alert-danger"><?= $_SESSION['erro'] ?></p> 
                                <?php
                                unset($_SESSION['erro']);
                            }
                            ?>
                            <form action="fazerlogin.php" method="post" name="Login_Form" class="form-signin">                     

                                <hr class="spartan">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon1">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control" name="username" placeholder="username" required="" autofocus="" />
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon1">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" name="senha" placeholder="senha" />         	  
                                </div>
                                <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Entrar" type="Submit">Entrar</button>  			
                            </form>			
                        </div>
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
                                <a class="logo" href="#">
                                    <img src="./img/logo.png" alt="">
                                </a>
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
