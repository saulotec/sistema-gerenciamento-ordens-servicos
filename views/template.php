<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Gerenciamento de Ordem de Serviço</title>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/<?php if( isset($templateHome)){
        echo $templateHome;}else{ echo "template";} ?>.css"/>

         <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/<?php if( isset($visualizar)){
        echo $visualizar;}else{ echo "template";} ?>.css"/>

        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/<?php if( !isset($style)){
        $style=0;}else{ echo $style;} ?>.css"/>

		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/<?php if( !isset($style)){
        $style=0;}else{ echo $style;} ?>.css"/>		
        
	</head>
	<body>		
		<div class="container">
			<header>
			<div>

				<!--<img src="<?php echo BASE_URL;?>assets/images/logo-completo-branco.png"  width="100px" height="60px"/>-->
			</div>
			</header>	
			<main>
				<div class="topo_main">
					<!--<img src="<?php echo BASE_URL;?>assets/images/logo-completo-textura.png"  width="100px" height="60px"/>-->
					<div class="lm"><img src="<?php echo BASE_URL;?>assets/images/ls.png"/></div>					
					<div class="ls"></div>			
				</div>
				<div class="meio">
					<div class="os">
						OS
					</div>					
					<ul>
						
                        <li><a href="<?php echo BASE_URL;?>home"><img src="<?php echo BASE_URL;?>assets/images/home.png" width="20px" height="20px"/>Home</a></li>
						<li><a href="<?php echo BASE_URL;?>ordem"><img src="<?php echo BASE_URL;?>assets/images/novaos.png" width="20px" height="20px"/>Nova OS</a></li>						
						<li>
							<a ><img src="<?php echo BASE_URL;?>assets/images/consultaros.png" width="20px" height="20px"/>Consultar OS</a>
						
							<div class="submenu">
								<a href="<?php echo BASE_URL;?>ordem/buscaros"><div class="submenuitem">Visualizar</div></a>
								<a href="<?php echo BASE_URL;?>ordem/buscarosE"><div class="submenuitem">Editar</div></a>
								<a href="<?php echo BASE_URL;?>ordem/buscarosA"><div class="submenuitem">Atualizar</div></a>
							</div>							
						</li>
					</ul>										
				</div>
				<div class="meio">
					<div class="os">
						Cadastro
					</div>					
					<ul>
						<li>
							<a><img src="<?php echo BASE_URL;?>assets/images/cliente.png" width="20px" height="20px"/>Cliente</a>
							<div class="submenu">
								<a href="<?php echo BASE_URL;?>cliente/cadastrar"><div class="submenuitem">Cadastrar</div></a>
								<a href="<?php echo BASE_URL;?>cliente/buscarce"><div class="submenuitem">Editar</div></a>
								<a href="<?php echo BASE_URL;?>cliente/buscarcvs"><div class="submenuitem">visualizar</div></a>
							</div>		
						</li>

						<li>
							<a><img src="<?php echo BASE_URL;?>assets/images/fornecedor.png" width="20px" height="20px"/>Fornecedor</a>
							<div class="submenu">
								<a href="<?php echo BASE_URL;?>fornecedor/cadastrar"><div class="submenuitem">Cadastrar</div></a>
								<a href="<?php echo BASE_URL;?>fornecedor/buscarfe"><div class="submenuitem">Editar</div></a>
								<a href="<?php echo BASE_URL;?>fornecedor/buscarfvs"><div class="submenuitem">visualizar</div></a>
							</div>		
						</li>
					
						<li>
							<a><img src="<?php echo BASE_URL;?>assets/images/produto.png" width="20px" height="20px"/>Produtos</a>
							<div class="submenu">
								<a href="<?php echo BASE_URL;?>produto/cadastrar"><div class="submenuitem">Cadastrar</div></a>
								<a href="<?php echo BASE_URL;?>produto/buscarpe"><div class="submenuitem">Editar</div></a>
								<a href="<?php echo BASE_URL;?>produto/buscarpvs"><div class="submenuitem">visualizar</div></a>
							</div>		
						</li>							
						
					</ul>										
				</div>				
			</main>	    
			<aside>
                <?php $this->loadViewInTemplate($viewName,$viewData);?>     
                     
			</aside>	
			<footer>
				<div class="divfooter">
					Copyright © L&S todos os direitos reservados 2020

				</div>
				
			</footer>
		</div>
	</body>
</html>