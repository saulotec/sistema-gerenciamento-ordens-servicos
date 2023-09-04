<?php 
class Fornecedor extends model {

	public function cadastrando($dados){
		
		$endereco = $dados['endereco'];
		$nome = $dados['nome'];		
		$site = $dados['site'];
		
		$stmt = $this->db->prepare("SELECT * FROM fornecedor WHERE endereco = :endereco || nome = :nome || site = :site");
		$stmt->bindValue(":endereco",($endereco));
		$stmt->bindValue(":nome", ($nome));
		$stmt->bindValue(":site", ($site));

		$stmt->execute();

		if($stmt->rowCount() > 0){ // se o fornecedor já tem cadastro

		 	$row = $stmt->fetch();

		 	$_SESSION['ID'] = $row['id'];
		 	//var_dump($_SESSION['ID']);
		 	return false;


		}else{ // CASO FORNECEDOR AINDA NÃO TENHA CADASTRO.				 

			foreach ($dados as $bind => $value) {
				if($value != ""){
    				$dataSet[] = "{$bind} = :{$bind}";
				}
			}
				$dataSet = implode(", ", $dataSet);

				

				$stmt=$this->db->prepare("INSERT INTO fornecedor SET {$dataSet}");								
			
				

			foreach ($dados as $bind => $value) {
			    if($value != ""){
			        $stmt->bindValue(":{$bind}", $value);    
			    }				    
			}			

				if($stmt->execute()){ // se o cadastro de certo pego o ID do fornecedor.
				

				 $_SESSION['CD'] = $this->db->lastInsertId();				

				 $sql = $this->db->prepare("SELECT * FROM fornecedor WHERE id = :id");
				 $sql->bindValue(":id", ( $_SESSION['CD']));
			  
			  	 $sql->execute();
			  	 	if($sql->rowCount() > 0){ // SE O FORNECEDOR FOI CADASTRADO

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

	public function getFornecedor($dados){

		$campoSelecao = $dados['selecao'];
		$campoBusca = $dados['busca'];

		$dataSet = "{$campoSelecao} = :campoBusca";

		$stmt = $this->db->prepare("SELECT * FROM fornecedor WHERE  {$dataSet} ");				
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

			$stmt = $this->db->prepare("UPDATE fornecedor SET {$dataSet} WHERE id = :id");

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
