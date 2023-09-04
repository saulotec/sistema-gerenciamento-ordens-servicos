<?php
class ordemController extends controller {

	public function index() {
				$dados['style'] = 'style';

		$this->loadTemplate('cadastro_ordem',$dados);
	}
	public function cadastroc(){
		$dados= array();

		$cadastroC= new Cadastros();

		$dadoscd = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

		$info=$cadastroC->cadastroCliente($dadoscd);

		$dados['style']='style';
		$dados['info'] = $info;

		$this->loadTemplate('cadastro_ordem',$dados);
	}

	public function cadastroa(){ //cadastro do aparelho		

		$dados= array();

		$cadastroA= new Cadastros();

		$dadoscda = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);		

		$infoAparelho = $cadastroA->cadastroAparelho($dadoscda);		

		$infoCliente = $cadastroA->getCliente(); 
		
		$infoAparelho = $cadastroA->getAparelho();

		$dados['info_cliente'] = $infoCliente;

		$dados['style']='style';

		$dados['info_aparelho']= $infoAparelho;

		$this->loadView('imprimir_os',$dados);
	}

	public function formap(){ // acessar formulário de cadastro do apparelho
		$dados= array();

		$dadoscda = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

		if($dadoscda != ""){

			$dados['info']=$dadoscda;
			$dados['style'] = 'cdaparelho';

			$this->loadTemplate('cadastro_aparelho',$dados);
		}else{

			$dados['info']=$dadoscda;
			$dados['style'] = 'style';


			$this->loadTemplate('cadastro_ordem',$dados);
		}
	}
	
	
	public function clientec(){	//pesquisar se cliente já tem cadastro.

		$dados= array();

		$clienteC= new Cadastros();

		$dadoscda = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

		

		$info=$clienteC->clienteCadastrado($dadoscda);	

		$dados['style']='style';
		$dados['info']= $info;
		

		$this->loadTemplate('cadastro_ordem',$dados);
	}

	public function imprimirOS(){
		$dados= array();


		$this->loadView('imprimir_os',$dados);
	
	}

	public function concluida(){
		$dados= array();

		$concluida = new Cadastros();

		$concluida->ordemConcluida();

		$dados['style']='style';

		
		$this->loadTemplate('cadastro_ordem',$dados);
	
	}
	public function buscaros(){

		$dados=array();

		$dados['visualizar'] = 'visualizar';

		$dados['visu'] = 'visualizar';

		$dados['action'] = 'pegaros';

		$this->loadTemplate('buscar', $dados);

	}
	public function buscarosE(){

		$dados=array();

		$dados['visualizar'] = 'visualizar';

		$dados['action'] = 'editar';

		$dados['edit'] = 'editar';

		$this->loadTemplate('buscar', $dados);

	}

	public function buscarosA(){

		$dados=array();

		$dados['visualizar'] = 'visualizar';

		$dados['action'] = 'atualizar';

		$dados['update'] = 'atualizar';

		$this->loadTemplate('buscar', $dados);

	}

	public function pegaros(){
		$dados= array();

		$dadospost = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

		if($dadospost['buscaros'] == 'id' && $dadospost['buscarinfo'] != ''){

			$visualizar = new Cadastros();

			$info = $visualizar->get_os($dadospost);

			if($info != false){			

				$infoCliente = $visualizar->getCliente();

				$dados['info'] = $info;

				$dados['infocliente'] = $infoCliente;

				$dados['style'] = 'cdaparelho';		

				$this->loadTemplate('visualizando', $dados);

			}else{
				
				$dados['visualizar'] = 'visualizar';

				$dados['visu'] = 'visualizar';

				$dados['action'] = 'pegaros';

				$this->loadTemplate('buscar', $dados);
			}

		}else if($dadospost['buscaros'] == 'id_cliente' && $dadospost['buscarinfo'] != ''){
			$visualizar = new Cadastros();

			$info = $visualizar->get_id_cliente($dadospost);

			$dados['info'] = $info;

			if($info != false){	

				$dados['visualizar'] = 'visualizar';

				$dados['visu'] = 'visualizar';

				$dados['action'] = 'pegaros';

				$this->loadTemplate('buscar', $dados);

			}else{
				
				$dados['visualizar'] = 'visualizar';

				$dados['visu'] = 'visualizar';

				$dados['action'] = 'pegaros';

				$this->loadTemplate('buscar', $dados);
			}

		}else if($dadospost['buscaros'] == 'nome' || $dadospost['buscaros'] == 'email' && $dadospost['buscarinfo'] != ''){

			$visualizar = new Cadastros();

			$info = $visualizar->contar_os($dadospost);

			$dados['info'] = $info;

			if($info != false){	

				$dados['visualizar'] = 'visualizar';

				$dados['visu'] = 'visualizar';

				$this->loadTemplate('buscar', $dados);

			}else{
				
				$dados['visualizar'] = 'visualizar';

				$dados['visu'] = 'visualizar';

				$dados['action'] = 'pegaros';

				$this->loadTemplate('buscar', $dados);
			}

		}else{
			
			$dados['visualizar'] = 'visualizar';

			$dados['visu'] = 'visualizar';

			$dados['action'] = 'pegaros';

			$this->loadTemplate('buscar', $dados);
		}	
	}

	public function editar(){
		$dados= array();

		$dadospost = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

		if($dadospost['buscaros'] == 'id' && $dadospost['buscarinfo'] != ''){ //pelo número da ordem

			$class = new Cadastros();

			$info = $class->get_os($dadospost);

			if($info != false){

				$infoCliente = $class->getCliente();

				$dados['infocliente'] = $infoCliente;

				$dados['info'] = $info;		

				$dados['style'] = 'cdaparelho';

				$this->loadTemplate('editar-os', $dados);
			}else{
				$dados['visualizar'] = 'visualizar';

				$dados['action'] = 'editar';

				$dados['edit'] = 'editar';

				$this->loadTemplate('buscar', $dados);
			}

		}else if($dadospost['buscaros'] == 'id_cliente' && $dadospost['buscarinfo'] != ''){ // PELO NÚMERO DO CLIENTE
			
			$visualizar = new Cadastros();

			$info = $visualizar->get_id_cliente($dadospost);

			if($info != false){
			
				$dados['info'] = $info;

				$dados['visualizar'] = 'visualizar';

				$dados['visu'] = 'visualizar';

				$dados['action'] = 'editar';

				$this->loadTemplate('buscar', $dados);

			}else{
				$dados['visualizar'] = 'visualizar';

				$dados['action'] = 'editar';

				$dados['edit'] = 'editar';

				$this->loadTemplate('buscar', $dados);
			}

		}else if($dadospost['buscaros'] == 'nome' || $dadospost['buscaros'] == 'email' && $dadospost['buscarinfo'] != ''){ //POR NOME OU POR EMAIL

			$editar = new Cadastros();

			$info = $editar->contar_os($dadospost);

			$dados['info'] = $info;

			if($info != false){

				$dados['visualizar'] = 'visualizar';

				$dados['action'] = 'editar';

				$dados['edit'] = 'editar';

				$this->loadTemplate('buscar', $dados);

			}else{
				$dados['visualizar'] = 'visualizar';

				$dados['action'] = 'editar';

				$dados['edit'] = 'editar';

				$this->loadTemplate('buscar', $dados);
			}

		}else{
			$dados['visualizar'] = 'visualizar';

			$dados['action'] = 'editar';

			$dados['edit'] = 'editar';			

			$this->loadTemplate('buscar', $dados);
		}
	}

	public function atualizar(){
		$dados= array();

		$dadospost = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

		if($dadospost['buscaros'] == 'id' && $dadospost['buscarinfo'] != ''){

			$atualizar = new Cadastros();

			$info = $atualizar->get_os($dadospost);

			if($info != false){	

				$infoCliente = $atualizar->getCliente();

				$dados['infocliente'] = $infoCliente;

				$dados['info'] = $info;		

				$dados['style'] = 'cdaparelho';

				$this->loadTemplate('atualizar-os', $dados);

			}else{
				$dados['visualizar'] = 'visualizar';

				$dados['action'] = 'atualizar';

				$dados['update'] = 'atualizar';

				$this->loadTemplate('buscar', $dados);
			}

		}else if($dadospost['buscaros'] == 'id_cliente' && $dadospost['buscarinfo'] != ''){
			$visualizar = new Cadastros();

			$info = $visualizar->get_id_cliente($dadospost);

			if($info != false){	

				$dados['info'] = $info;

				$dados['visualizar'] = 'visualizar';

				$dados['visu'] = 'visualizar';

				$dados['action'] = 'atualizar';

				$this->loadTemplate('buscar', $dados);

			}else{
				$dados['visualizar'] = 'visualizar';

				$dados['action'] = 'atualizar';

				$dados['update'] = 'atualizar';

				$this->loadTemplate('buscar', $dados);
			}

		}else if($dadospost['buscaros'] == 'nome' || $dadospost['buscaros'] == 'email' && $dadospost['buscarinfo'] != ''){

			$atualizar = new Cadastros();

			$info = $atualizar->contar_os($dadospost);

			if($info != false){	

				$dados['info'] = $info;

				$dados['visualizar'] = 'visualizar';

				$dados['action'] = 'editar';

				$dados['edit'] = 'editar';

				$this->loadTemplate('buscar', $dados);

			}else{
				$dados['visualizar'] = 'visualizar';

				$dados['action'] = 'atualizar';

				$dados['update'] = 'atualizar';

				$this->loadTemplate('buscar', $dados);
			}

		}else{
			$dados['visualizar'] = 'visualizar';

			$dados['action'] = 'atualizar';

			$dados['update'] = 'atualizar';

			$this->loadTemplate('buscar', $dados);
		}
	}

	public function atualizado(){

		$dados=array();

		$dadospost = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

		$atualizado = new Cadastros();

		$atualizado->atualizando($dadospost);

		$dados['visualizar'] = 'visualizar';

		$dados['action'] = 'atualizar';

		$dados['update'] = 'atualizar';

		$this->loadTemplate('buscar', $dados);

	}

	public function editado(){
		$dados=array();

		$dadospost = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

		$editado = new Cadastros();

		$editado->editando($dadospost);

		$dados['visualizar'] = 'visualizar';

		$dados['action'] = 'editar';

		$dados['edit'] = 'editar';

		$this->loadTemplate('buscar', $dados);
	}
}