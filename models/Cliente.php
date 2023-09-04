<?php
class Cliente extends model{				

	public function cadastrando($dados){

		$rg_cpf = $dados['rg_cpf'];
		$nome = $dados['nome'];
		$email = $dados['email'];
		
		$stmt = $this->db->prepare("SELECT * FROM cadastro_cliente WHERE rg_cpf = :rg_cpf || nome = :nome || email = :email");
		$stmt->bindValue(":rg_cpf",($rg_cpf));
		$stmt->bindValue(":nome", ($nome));
		$stmt->bindValue(":email", ($email));

		$stmt->execute();

		if($stmt->rowCount() > 0){ // se o cliente já tem cadastro
		 	$row = $stmt->fetch();

		 	$_SESSION['ID'] = $row['id'];
		 	
		 	return false;


		}else{ // CASO CLIENTE AINDA NÃO TENHA CADASTRO.				 

			foreach ($dados as $bind => $value) {
				if($value != ""){
    				$dataSet[] = "{$bind} = :{$bind}";
				}
			}
				$dataSet = implode(", ", $dataSet);

				$stmt=$this->db->prepare("INSERT INTO cadastro_cliente SET {$dataSet}");								
			
				//var_dump($stmt);

			foreach ($dados as $bind => $value) {
			    if($value != ""){
			        $stmt->bindValue(":{$bind}", $value);
			    }				    
			}

				if($stmt->execute()){ // se o cadastro de certo pego o ID do cliente.
				

				 $_SESSION['ID'] = $this->db->lastInsertId();
				//var_dump( $_SESSION['ID']);

				 $sql = $this->db->prepare("SELECT * FROM cadastro_cliente WHERE id = :id");
				 $sql->bindValue(":id", ( $_SESSION['ID']));
			  
			  	 $sql->execute();
			  	 	if($sql->rowCount() > 0){ // SE O CLIENTE FOI CADASTRADO

		 			$row = $sql->fetch();
		 	
		 			return $row;
			  
				  	echo "Deu certo";
				    }

				}else{

					//return $dados='nCad';
					echo "Não cadastrou";
				}
				
				
		}
	}

	public function getClientev($dados){

		$campoSelecao = $dados['selecao'];
		$campoBusca = $dados['busca'];

		$dataSet = "{$campoSelecao} = :campoBusca";

		$stmt = $this->db->prepare("SELECT * FROM cadastro_cliente WHERE  {$dataSet} ");				
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

			$stmt = $this->db->prepare("UPDATE cadastro_cliente SET {$dataSet} WHERE id = :id");

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

