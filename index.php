<?php
  
  require_once 'tamplate/head.php';
  
    
    require_once 'conexao.php';

        $sql = "SELECT * FROM produto as p JOIN fornecedor as f ON p.FKFornecedor = f.  codigoFornecedor";
        $query = mysqli_query($conn, $sql);     
?>

	
	

	<!-- section -->
	<div class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				

				<!-- MAIN -->
				<div id="main" class="col-md-12">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div>
							
						</div>
						<div class="pull-right">
							
							<ul class="store-pages">
								<li><span class="text-uppercase">Page:</span></li>
								<li class="active">1</li>
								
								<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
							</ul>
						</div>
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">

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
		                $foto = $exibe['fotoProduto'];

            	
							
            			echo '<div class="col-md-4 col-sm-6 col-xs-6">
								<div class="product product-single">
									<div class="product-thumb">
										<div class="product-label">
											<span>New</span>
											<span class="sale">-20%</span>
										</div>
										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
										<img src="./img/produtos/'.$foto.'" alt="">
									</div>
									<div class="product-body">
										<h3 class="product-price">R$: '.$valor.'<del class="product-old-price"></del></h3>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o empty"></i>
										</div>
										<h2 class="product-name"><a href="#">'.$nomeProduto.'</a></h2>
										<div class="product-btns">
											
											<a href="checkout.php?acao=add&id='.$codigo.'"><button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add ao Carinnho</button><a/>
										</div>
									</div>
								</div>
							</div>';
						}
					?>
							
							
							
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->

					<!-- store bottom filter -->
					<div class="store-filter clearfix">						
						<div class="pull-right">							
							<ul class="store-pages">
								<li><span class="text-uppercase">Page:</span></li>
								<li class="active">1</li>								
								<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
							</ul>
						</div>
					</div>
					<!-- /store bottom filter -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	
	
	<!-- /section -->

<?php
                                require_once 'tamplate/footer.php';
?>
