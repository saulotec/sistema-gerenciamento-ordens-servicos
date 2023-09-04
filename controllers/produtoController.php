<?php
class produtoController extends controller{
public function index(){
		$dados= array();

		$dados['style'] = 'cdaparelho';	
		
		$this->loadTemplate('cadastro_produto',$dados);

	}

	public function cadastrar(){
		$dados= array();

		$dados['style'] = 'cdaparelho';	
		
		$this->loadTemplate('cadastro_produto',$dados);

	}

	public function cadastrado($dados){	
		
		$dados= array();

		$cadastrar = new Produtos();		

		$dadoscda = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

		if(isset($dadoscda) && $dadoscda != ''){

			$info = $cadastrar-> cadastrando($dadoscda);

			if($info != false){

				$dados['ProdutoCadastrado'] = $info;

				$dados['style'] = 'cdaparelho';	
				
				$this->loadTemplate('cadastro_produto',$dados);

			}else{

				$dados['jacadastrado'] = true;

				$dados['style'] = 'cdaparelho';	
			
				$this->loadTemplate('cadastro_produto',$dados);
			}
		}
	}
	public function buscarpe(){

		$dados= array();

		$dados['visualizar'] = 'visualizar';

		$dados['edit'] = 'editar';

		$dados['action'] = 'editar';

		$this->loadTemplate('buscar_produto', $dados);
	}

	public function buscarpvs(){

		$dados= array();

		$dados['visualizar'] = 'visualizar';

		$dados['visu'] = 'visualizar';

		$dados['action'] = 'visualizar';

		$this->loadTemplate('buscar_produto', $dados);
	}

	public function editar(){

		$dados= array();

		$visuaEdit = new Produtos();		

		$dadosvs = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

		if($dadosvs != '' && isset($dadosvs['selecao']) && $dadosvs['selecao'] == 'id' || $dadosvs['selecao'] == 'nome' || $dadosvs['selecao'] == 'marca' && $dadosvs['busca'] != ''){

			$info = $visuaEdit -> getProduto($dadosvs);

			if($info != false){

				$dados['infoProduto'] = $info;

				$dados['style'] = 'cdaparelho';	

				$this->loadTemplate('editar_produto', $dados);

			}else{
				$dados['visualizar'] = 'visualizar';

				$dados['edit'] = 'editar';

				$dados['action'] = 'editar';

				$this->loadTemplate('buscar_produto', $dados);
			}

		}else{
			$dados['visualizar'] = 'visualizar';

			$dados['edit'] = 'editar';

			$dados['action'] = 'editar';

			$this->loadTemplate('buscar_produto', $dados);
		}
	}			

	public function visualizar(){

		$dados = array();

		$visualizando = new Produtos();		

		$dadosvs = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

		if(isset($dadosvs['selecao']) && $dadosvs['selecao'] == 'id' || $dadosvs['selecao'] == 'nome' || $dadosvs['selecao'] == 'site' && $dadosvs['busca'] != ''){

			$info = $visualizando-> getProduto($dadosvs);

			if($info != false){

				$dados['infoProduto'] = $info;

				$dados['style'] = 'cdaparelho';	

				$this->loadTemplate('visualizar_produto', $dados);
			}else{
				$dados['visualizar'] = 'visualizar';

				$dados['visu'] = 'visualizar';

				$dados['action'] = 'visualizar';

				$this->loadTemplate('buscar_produto', $dados);
			}
		}else{
			$dados['visualizar'] = 'visualizar';

			$dados['visu'] = 'visualizar';

			$dados['action'] = 'visualizar';

			$this->loadTemplate('buscar_produto', $dados);
		}
	}

	public function editado(){

		$dados = array();

		$editou = new Produtos();

		$dadosedi = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);		

		$info = $editou->editando($dadosedi);		

		$dados['infoProduto'] = $info;

		$dados['visualizar'] = 'visualizar';

		$dados['edit'] = 'editar';

		$dados['action'] = 'editar';



		$this->loadTemplate('buscar_produto', $dados); 



	}
}