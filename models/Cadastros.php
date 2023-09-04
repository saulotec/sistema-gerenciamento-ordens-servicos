<?php
	class Cadastros extends model {		
		

		
		public function cadastroCliente($dados) {				
			
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
			 	
			 	return $row;// aqui eu posso mandar uma variável com o id para o meu ordemController salvar em $dados e mostrar na tela.
			}else{ // caso não tenha cadastro				 

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
					// var_dump( $_SESSION['ID']);

					 $sql = $this->db->prepare("SELECT * FROM cadastro_cliente WHERE id = :id");
					 $sql->bindValue(":id", ( $_SESSION['ID']));
				  
				  	 $sql->execute();
				  	 	if($sql->rowCount() > 0){ // se o cliente já tem cadastro
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
		

		public function cadastroAparelho($dados){			

			

			if(isset($_SESSION['id_ordem'])){

			 	$stmt = $this->db->prepare("SELECT * FROM cadastro_aparelho WHERE id = :id_ordem");				 	
			    
				$stmt->bindValue(":id_ordem", $_SESSION['id_ordem'] );	
				/*var_dump($stmt);*/
				if($stmt->execute()){

				//if($stmt->rowCount() > 0){

					echo "Imprima a OS!";
				}	
			}else{
				foreach ($dados as $bind => $value) {
						if($value != ""){
					$dataSet[] = "{$bind} = :{$bind}";
					}
				}
				/*var_dump($dataSet);*/
				$dataSet = implode(", ",$dataSet);	

				$stmt=$this->db->prepare("INSERT INTO  cadastro_aparelho SET id_cliente = :id_cliente, {$dataSet}");
				/*var_dump($stmt);
				var_dump($_SESSION['ID']);*/

				foreach ($dados as $bind => $value) {
				    if($value != ""){
				        $stmt->bindValue(":{$bind}", $value);
				    }				    
				}
					$stmt->bindValue(":id_cliente", $_SESSION['ID']);																

				if($stmt->execute()){

					echo "Deu certo!";
				
					$_SESSION['id_ordem'] = $this->db->lastInsertId();

					$sql = $this->db->prepare("SELECT * FROM cadastro_aparelho WHERE id_cliente = :id");
					$sql->bindValue(":id", ( $_SESSION['ID']));					

					if($sql->execute()){

					

						$row = $sql->fetch();

						return $row;

						echo "Deu certo!";
					}				
				}else{
					echo "Não executou";
				}	
			}
		}

		public function clienteCadastrado($dados){			


			if(empty($nome = $dados['nome'])) {
				$nome='substituiVazio';
			}
			if(empty($id=$dados['id'])){
				$id='substituiVazio';
			}

			if(!empty($nome = $dados['nome']) || !empty($id=$dados['id'])){
			
				$stmt = $this->db->prepare("SELECT * FROM cadastro_cliente WHERE  nome = :nome || id = :id");				
				$stmt->bindValue(":nome", ($nome));
				$stmt->bindValue(":id", ($id));

				$stmt->execute();

				if($stmt->rowCount() > 0){
					$row = $stmt->fetch();
					$_SESSION['ID'] = $row['id'];
					

					return $row;  // aqui eu posso mandar uma variável com o id para o meu ordemController salvar em $dados e mostrar na tela.
				}else{
					return $dados='nCad';
				}

			}
		}

		public function getCliente(){

			if(isset($_SESSION['ID']) && $_SESSION['ID'] != ''){

				$id = $_SESSION['ID'];

				$stmt = $this->db->prepare("SELECT * FROM cadastro_cliente WHERE  id = :id ");				
				$stmt->bindValue(":id", ($id));

				$stmt->execute();

				if($stmt->rowCount() > 0){
					$row = $stmt->fetch();
					return $row;
				}
			}else{
				return false;
			}		
		}

		public function getAparelho(){

			if(isset($_SESSION['ID']) && $_SESSION['ID'] != ''){

				$id = $_SESSION['ID'];

				$stmt = $this->db->prepare("SELECT * FROM cadastro_aparelho WHERE  id_cliente = :id ");				
				$stmt->bindValue(":id", ($id));

				$stmt->execute();

				if($stmt->rowCount() > 0){
					$row = $stmt->fetch();

					$_SESSION['ordem_id'] = $row['id'];
					return $row;
				}
			}	
		}

		public function ordemConcluida(){

			session_destroy();
		
		}

		public function get_os($dados){

			if(isset($dados['buscaros']) && $dados['buscaros'] == 'id'){

				$tipo = $dados['buscaros'];
				$especificacao = $dados['buscarinfo'];

				$dataSet = "{$tipo} = :especificacao";

				/*var_dump($dataSet);*/

				  /*var_dump($tipo);
				  var_dump($especificacao);*/

				$stmt = $this->db->prepare("SELECT * FROM cadastro_aparelho WHERE {$dataSet} "); 
				
				$stmt->bindValue(":especificacao", $especificacao);

				/*var_dump($stmt);*/

				$stmt->execute();

				if($stmt->rowCount() > 0){

					$row = $stmt->fetch();

					$_SESSION['id'] = $row['id'];//número da ordem
					$_SESSION['ID']	= $row['id_cliente'];//número do cliente			 	

				 	return $row;

				}else{

					return false;

				 	echo "Não encontrado no sistema.";
				}														
			
							
			}
		

		}

		public function get_id_cliente($dados){

			if(isset($dados['buscaros']) && $dados['buscaros'] == 'id_cliente'){

				$tipo = $dados['buscaros'];
				$especificacao = $dados['buscarinfo'];

				$stmt = $this->db->prepare("SELECT * FROM cadastro_cliente where id=:id_cliente");

			 	$stmt->bindValue(":id_cliente", $especificacao);

			 	$stmt->execute();
			 	
			 	if($stmt->rowCount() > 0){
				 	
				 	$nome=$stmt->fetch();
				 	$_SESSION['nome']=$nome['nome'];
				}else{
					
					return false;
			 	echo "Não encontrado no sistema.";
				}	

				$dataSet = "{$tipo} = :especificacao";

				/*var_dump($dataSet);*/

				 /* var_dump($tipo);
				  var_dump($especificacao);*/

				$stmt = $this->db->prepare("SELECT * FROM cadastro_aparelho WHERE {$dataSet} "); 
				
				$stmt->bindValue(":especificacao", $especificacao);

				/*var_dump($stmt);*/

				$stmt->execute();

				if($stmt->rowCount() > 0){

					$row = $stmt->fetchAll();

											 	

				 	return $row;


				}else{
					return false;
				 	echo "Não encontrado no sistema.";
				}														
			}
							
				
		}

		public function atualizando($dados){

			foreach($dados as $bind => $value){
				if($value != ''){
					$dataset[]="{$bind} = :{$bind}";
				}
			}

			$dataset = implode(", ", $dataset);
			
			var_dump($dataset);

			

			if(isset($_SESSION['id'])){

				$stmt= $this->db->prepare("UPDATE cadastro_aparelho SET {$dataset} WHERE id = :id");
				
				var_dump($stmt);

				foreach($dados as $bind => $value){
					if($value != ""){
						$stmt->bindValue(":{$bind}", $value);
					}
				}
					$stmt->bindValue(":id", $_SESSION['id']);		
				/*var_dump($value);

				var_dump($_SESSION['id']);*/
							

				if($stmt->execute()){
					echo "Situação atualizada com sucesso!";
				}

			}else{
				echo "Nenhuma OS selecionada.";
			}
		}

		public function editando($dados){

			foreach($dados as $bind => $value){
				if($value != ''){
					$dataset[]="{$bind} = :{$bind}";
				}
			}

			$dataset = implode(", ", $dataset);
			
			/*var_dump($dataset);*/

			

			if(isset($_SESSION['id'])){

				$stmt= $this->db->prepare("UPDATE cadastro_aparelho SET {$dataset} WHERE id = :id");
				
				/*var_dump($stmt);*/

				foreach($dados as $bind => $value){
					if($value != ""){
						$stmt->bindValue(":{$bind}", $value);
					}
				}
					$stmt->bindValue(":id", $_SESSION['id']);		
				/*var_dump($value);

				var_dump($_SESSION['id']);*/
							

				if($stmt->execute()){
					echo "Situação editada com sucesso!";
				}

			}else{
				echo "Nenhuma OS selecionada.";
			}
		}


		public function contar_os($dados){
			if(isset($dados['buscaros']) && $dados['buscarinfo'] != ''){
				
				$tipo = $dados['buscaros'];
				$especificacao = $dados['buscarinfo'];

				$dataSet = "{$tipo} = :especificacao";

				/*var_dump($dataSet);

				var_dump($tipo);
				var_dump($especificacao);*/

				$stmt = $this->db->prepare("SELECT * FROM cadastro_cliente WHERE {$dataSet} "); 
				
				$stmt->bindValue(":especificacao", $especificacao);

				/*var_dump($stmt);*/

				$stmt->execute();

				if($stmt->rowCount() > 0){

					$row=$stmt->fetch();

					$id_cliente	= $row['id']; //número do cliente

					$_SESSION['nome'] = $row['nome']; //nome do cliente

					$stmt = $this->db->prepare("SELECT * FROM cadastro_aparelho WHERE id_cliente = :id_cliente "); 
				
					$stmt->bindValue(":id_cliente", $id_cliente);

					/*var_dump($stmt);*/

					$stmt->execute();

					if($stmt->rowCount() > 0){

						$row = $stmt->fetchAll();					 	

					 	return $row;
					}else{

					 	echo "Não encontrado no sistema.";
					}						

				}else{

						echo "Não encontrado no sistema, faça uma nova buscar.";

				}

			}else{
				echo "passou pelo primeiro if";
			}
		}

		

	}

