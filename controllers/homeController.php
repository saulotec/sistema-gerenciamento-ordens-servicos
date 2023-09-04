<?php
class homeController extends controller {

    public function index(){
		$dados=array();    		
		
	   	$this->loadView('login', $dados);
	}

	public function login(){
		
		$dados=array();	

		$dadosLogin = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);
		

		if($dadosLogin['email'] != '' && $dadosLogin['senha'] != ''){

			$anuncios = new Anuncios();
			$info = $anuncios->verificarLogin($dadosLogin);

			if($info !='semLogin'){

				$dados['infoLogin'] = $info;

				$dados = array(
					'getQuantidade' => $anuncios->getQuantidade(),
					'Clientes' => $anuncios->getClientes(),
					'getOrcamento' => $anuncios->getOrcamento(),
					'getOrcamentoPronto' => $anuncios->getOrcamentoPronto(),
					'getOrcamentoAprovado' => $anuncios->getOrcamentoAprovado(),
					'getPronto' => $anuncios->getPronto(),
					'getSemReparo' => $anuncios->getSemReparo(),
					'getEntregueSemReparo' => $anuncios->getEntregueSemReparo(),
					'getEntreguePago' => $anuncios->getEntreguePago(),
					'getGarantia' => $anuncios->getGarantia(),
					'getDevolucao' => $anuncios->getDevolucao()
				 );
					
				 $dados['style'] = 'home';  
				 $dados['templateHome'] = 'templateHome'; 

				$this->loadTemplate('home', $dados);
			}else{

				$this->loadView('login', $dados);
			}

		}else{

			$this->loadView('login', $dados);
		}

	}
	
	public function page(){
		$dados=array();
		
		$anuncios = new Anuncios;

    	$dados = array(
       	'getQuantidade' => $anuncios->getQuantidade(),
       	'Clientes' => $anuncios->getClientes(),
       	'getOrcamento' => $anuncios->getOrcamento(),
       	'getOrcamentoPronto' => $anuncios->getOrcamentoPronto(),
       	'getOrcamentoAprovado' => $anuncios->getOrcamentoAprovado(),
       	'getPronto' => $anuncios->getPronto(),
       	'getSemReparo' => $anuncios->getSemReparo(),
       	'getEntregueSemReparo' => $anuncios->getEntregueSemReparo(),
       	'getEntreguePago' => $anuncios->getEntreguePago(),
       	'getGarantia' => $anuncios->getGarantia(),
       	'getDevolucao' => $anuncios->getDevolucao()
		);
		   
		$dados['style'] = 'home';  
		$dados['templateHome'] = 'templateHome'; 	

		$this->loadTemplate('home', $dados);	
	}

    
}