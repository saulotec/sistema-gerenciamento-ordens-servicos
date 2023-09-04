<?php 
class clienteController extends controller{
	public function index(){
		$dados= array();

		$dados['style'] = 'cdaparelho';	
		
		$this->loadTemplate('cadastro_cliente',$dados);

	}

	public function cadastrar(){
		$dados= array();

		$dados['style'] = 'cdaparelho';	
		
		$this->loadTemplate('cadastro_cliente',$dados);

	}

	public function cadastrado($dados){	
		
		$dados= array();

		$cadastrar = new Cliente();		

		$dadoscda = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);		

		$info = $cadastrar-> cadastrando($dadoscda);

		if($info != false){

			$dados['clienteCadastrado'] = $info;

			$dados['style'] = 'cdaparelho';	
			
			$this->loadTemplate('cadastro_cliente',$dados);

		}else{

			$dados['cadastrado'] = true;

			$dados['style'] = 'cdaparelho';	
		
			$this->loadTemplate('cadastro_cliente',$dados);
		}
	}

	public function buscarce(){

		$dados= array();

		$dados['visualizar'] = 'visualizar';

		$dados['edit'] = 'editar';

		$dados['action'] = 'editar';

		$this->loadTemplate('buscar_cliente', $dados);
	}

	public function buscarcvs(){

		$dados= array();

		$dados['visualizar'] = 'visualizar';

		$dados['visu'] = 'visualizar';

		$dados['action'] = 'visualizar';

		$this->loadTemplate('buscar_cliente', $dados);
	}

	public function editar(){

		$dados= array();

		$visuaEdit = new Cliente();		

		$dadosvs = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

		if(isset($dadosvs['selecao']) && $dadosvs['selecao'] == 'id' || $dadosvs['selecao'] == 'nome' || $dadosvs['selecao'] == 'email' && $dadosvs['busca'] != ''){

			$info = $visuaEdit -> getClientev($dadosvs);

			if($info != false){

				$dados['infoCliente'] = $info;

				$dados['style'] = 'cdaparelho';	

				$this->loadTemplate('editar_cliente', $dados);

			}else{
				$dados['visualizar'] = 'visualizar';

				$dados['edit'] = 'editar';

				$dados['action'] = 'editar';

				$this->loadTemplate('buscar_cliente', $dados);
			}

		}else{
			$dados['visualizar'] = 'visualizar';

			$dados['edit'] = 'editar';

			$dados['action'] = 'editar';

			$this->loadTemplate('buscar_cliente', $dados);
		}
	}			

	public function visualizar(){

		$dados = array();

		$visualizando = new Cliente();		

		$dadosvs = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

		if(isset($dadosvs['selecao']) && $dadosvs['selecao'] == 'id' || $dadosvs['selecao'] == 'nome' || $dadosvs['selecao'] == 'email' && $dadosvs['busca'] != ''){

			$info = $visualizando-> getClientev($dadosvs);

			if($info != false){

				$dados['infoCliente'] = $info;

				$dados['style'] = 'cdaparelho';	

				$this->loadTemplate('visualizar_cliente', $dados);
			}else{
				$dados['visualizar'] = 'visualizar';

				$dados['visu'] = 'visualizar';

				$dados['action'] = 'visualizar';

				$this->loadTemplate('buscar_cliente', $dados);
			}
		}else{
			$dados['visualizar'] = 'visualizar';

			$dados['visu'] = 'visualizar';

			$dados['action'] = 'visualizar';

			$this->loadTemplate('buscar_cliente', $dados);
		}
	}

	public function editado(){

		$dados = array();

		$editou = new Cliente();

		$dadosedi = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);		

		$info = $editou->editando($dadosedi);		

		$dados['infoCliente'] = $info;

		$dados['visualizar'] = 'visualizar';

		$dados['edit'] = 'editar';

		$dados['action'] = 'editar';



		$this->loadTemplate('buscar_cliente', $dados); 



	}
}
