<?php
class fornecedorController extends controller {
	
	public function index(){
		$dados= array();

		$dados['style'] = 'cdaparelho';	
		
		$this->loadTemplate('cadastro_fornecedor',$dados);

	}

	public function cadastrar(){
		$dados= array();

		$dados['style'] = 'cdaparelho';	
		
		$this->loadTemplate('cadastro_fornecedor',$dados);

	}

	public function cadastrado($dados){	
		
		$dados= array();

		$cadastrar = new Fornecedor();		

		$dadoscda = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

		if(isset($dadoscda) && $dadoscda != ''){

			$info = $cadastrar-> cadastrando($dadoscda);

			if($info != false){

				$dados['fornecedorCadastrado'] = $info;

				$dados['style'] = 'cdaparelho';	
				
				$this->loadTemplate('cadastro_fornecedor',$dados);

			}else{

				$dados['jacadastrado'] = true;

				$dados['style'] = 'cdaparelho';	
			
				$this->loadTemplate('cadastro_fornecedor',$dados);
			}
		}
	}
	public function buscarfe(){

		$dados= array();

		$dados['visualizar'] = 'visualizar';

		$dados['edit'] = 'editar';

		$dados['action'] = 'editar';

		$this->loadTemplate('buscar_fornecedor', $dados);
	}

	public function buscarfvs(){

		$dados= array();

		$dados['visualizar'] = 'visualizar';

		$dados['visu'] = 'visualizar';

		$dados['action'] = 'visualizar';

		$this->loadTemplate('buscar_fornecedor', $dados);
	}

	public function editar(){

		$dados= array();

		$visuaEdit = new Fornecedor();		

		$dadosvs = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

		if($dadosvs != '' && isset($dadosvs['selecao']) && $dadosvs['selecao'] == 'id' || $dadosvs['selecao'] == 'nome' || $dadosvs['selecao'] == 'site' && $dadosvs['busca'] != ''){

			$info = $visuaEdit -> getFornecedor($dadosvs);

			if($info != false){

				$dados['infoFornecedor'] = $info;

				$dados['style'] = 'cdaparelho';	

				$this->loadTemplate('editar_fornecedor', $dados);

			}else{
				$dados['visualizar'] = 'visualizar';

				$dados['edit'] = 'editar';

				$dados['action'] = 'editar';

				$this->loadTemplate('buscar_fornecedor', $dados);
			}

		}else{
			$dados['visualizar'] = 'visualizar';

			$dados['edit'] = 'editar';

			$dados['action'] = 'editar';

			$this->loadTemplate('buscar_fornecedor', $dados);
		}
	}			

	public function visualizar(){

		$dados = array();

		$visualizando = new Fornecedor();		

		$dadosvs = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

		if(isset($dadosvs['selecao']) && $dadosvs['selecao'] == 'id' || $dadosvs['selecao'] == 'nome' || $dadosvs['selecao'] == 'site' && $dadosvs['busca'] != ''){

			$info = $visualizando-> getFornecedor($dadosvs);

			if($info != false){

				$dados['infoFornecedor'] = $info;

				$dados['style'] = 'cdaparelho';	

				$this->loadTemplate('visualizar_fornecedor', $dados);
			}else{
				$dados['visualizar'] = 'visualizar';

				$dados['visu'] = 'visualizar';

				$dados['action'] = 'visualizar';

				$this->loadTemplate('buscar_fornecedor', $dados);
			}
		}else{
			$dados['visualizar'] = 'visualizar';

			$dados['visu'] = 'visualizar';

			$dados['action'] = 'visualizar';

			$this->loadTemplate('buscar_fornecedor', $dados);
		}
	}

	public function editado(){

		$dados = array();

		$editou = new Fornecedor();

		$dadosedi = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);		

		$info = $editou->editando($dadosedi);		

		$dados['infoFornecedor'] = $info;

		$dados['visualizar'] = 'visualizar';

		$dados['edit'] = 'editar';

		$dados['action'] = 'editar';



		$this->loadTemplate('buscar_fornecedor', $dados); 



	}
}