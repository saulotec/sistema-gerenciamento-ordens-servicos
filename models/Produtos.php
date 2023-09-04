<?php
class Produtos extends model{
	public function cadastrando($dados){
		
		$id_fornecedor = $dados['id_fornecedor'];
		$nome = $dados['nome'];		
		$marca = $dados['marca'];
		
		$stmt = $this->db->prepare("SELECT * FROM produto WHERE id_fornecedor = :id_fornecedor || nome = :nome || marca = :marca");
		$stmt->bindValue(":id_fornecedor",($id_fornecedor));
		$stmt->bindValue(":nome", ($nome));
		$stmt->bindValue(":marca", ($marca));

		$stmt->execute();

		if($stmt->rowCount() > 0){ // se o produto já tem cadastro

		 	$row = $stmt->fetch();

		 	$_SESSION['ID'] = $row['id'];
		 	var_dump($stmt);
		 	return false;


		}else{ // CASO PRODUTO AINDA NÃO TENHA CADASTRO.				 

			foreach ($dados as $bind => $value) {
				if($value != ""){
    				$dataSet[] = "{$bind} = :{$bind}";
				}
			}
				$dataSet = implode(", ", $dataSet);

				

				$stmt=$this->db->prepare("INSERT INTO produto SET {$dataSet}");								
			
				

			foreach ($dados as $bind => $value) {
			    if($value != ""){
			        $stmt->bindValue(":{$bind}", $value);    
			    }				    
			}			

				var_dump($stmt);

				if($stmt->execute()){ // se o cadastro de certo pego o ID do produto.
				

				 $_SESSION['CD'] = $this->db->lastInsertId();				

				 $sql = $this->db->prepare("SELECT * FROM produto WHERE id = :id");
				 $sql->bindValue(":id", ( $_SESSION['CD']));
			  
			  	 $sql->execute();
			  	 	if($sql->rowCount() > 0){ // SE O PRODUTO FOI CADASTRADO

		 			$row = $sql->fetch();
		 	
		 			return $row;
			  
				  	echo "Deu certo";
				    }

				}else{

					//return $dados='nCad';
					return false;
					echo "Não cadastrou";
				}
				
				
		}
	}

	public function getProduto($dados){

		$campoSelecao = $dados['selecao'];
		$campoBusca = $dados['busca'];

		$dataSet = "{$campoSelecao} = :campoBusca";

		$stmt = $this->db->prepare("SELECT * FROM produto WHERE  {$dataSet} ");				
		$stmt->bindValue(":campoBusca", $campoBusca);

		$stmt->execute();

		if($stmt->rowCount() > 0){
			
			$row = $stmt->fetch();

			$_SESSION['ID'] = $row['id'];
			
			return $row;

		}else{			
			return false;
		}
				
	}

	public function editando($dados){

		foreach($dados as $bind => $value){
			if($value !=''){
				$dataSet[] = "{$bind} = :{$bind}";
			}
		}

		$dataSet=implode(",", $dataSet);

		//if(isset($_SESSION['ID'])){

			$stmt = $this->db->prepare("UPDATE produto SET {$dataSet} WHERE id = :id");

			foreach($dados as $bind => $value){
				if($value !=''){
					$stmt->bindValue("{$bind}", $value);
				}
			}

			$stmt->bindValue(":id", $_SESSION['ID']);

			$stmt->execute();

			if($stmt->rowCount() > 0){

				return true;
			}else{
				return false;
			}
		//}else{
			//return false;
		//}
	}

}

