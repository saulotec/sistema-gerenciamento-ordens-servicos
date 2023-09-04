<?php
class Anuncios extends model {

	public function getQuantidade() {

		$sql = "SELECT COUNT(*) as c FROM cadastro_aparelho";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){

			$sql = $sql->fetch();
			return $sql['c'];
		}else{

			return 0;
		}
	}


	public function getClientes() {

		$sql = "SELECT COUNT(*) as c FROM cadastro_cliente";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){

			$sql = $sql->fetch();
			return $sql['c'];
		}else{

			return 0;
		}
	}

	public function getOrcamento() {

		$sql = "SELECT COUNT(*) as c FROM cadastro_aparelho WHERE situacao = 'Orcamento'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){

			$sql = $sql->fetch();
			return $sql['c'];
		}else{

			return 0;
		}
	}

	public function getOrcamentoPronto() {

		$sql = "SELECT COUNT(*) as c FROM cadastro_aparelho WHERE situacao = 'Orcamento Pronto'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){

			$sql = $sql->fetch();
			return $sql['c'];
		}else{

			return 0;
		}
	}

	public function getOrcamentoAprovado() {

		$sql = "SELECT COUNT(*) as c FROM cadastro_aparelho WHERE situacao = 'Aprovado'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){

			$sql = $sql->fetch();
			return $sql['c'];
		}else{

			return 0;
		}
	}

	public function getPronto() {

		$sql = "SELECT COUNT(*) as c FROM cadastro_aparelho WHERE situacao = 'Pronto'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){

			$sql = $sql->fetch();
			return $sql['c'];
		}else{

			return 0;
		}
	}

	public function getSemReparo() {

		$sql = "SELECT COUNT(*) as c FROM cadastro_aparelho WHERE situacao = 'Sem reparo'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){

			$sql = $sql->fetch();
			return $sql['c'];
		}else{

			return 0;
		}
	}

	public function getEntregueSemReparo() {

		$sql = "SELECT COUNT(*) as c FROM cadastro_aparelho WHERE situacao = 'Devolvido sem reparo'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){

			$sql = $sql->fetch();
			return $sql['c'];
		}else{

			return 0;
		}
	}

	public function getEntreguePago() {

		$sql = "SELECT COUNT(*) as c FROM cadastro_aparelho WHERE situacao = 'Entregue e pago'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){

			$sql = $sql->fetch();
			return $sql['c'];
		}else{

			return 0;
		}
	}

	public function getGarantia() {

		$sql = "SELECT COUNT(*) as c FROM cadastro_aparelho WHERE situacao = 'Garantia'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){

			$sql = $sql->fetch();
			return $sql['c'];
		}else{

			return 0;
		}
	}

	public function getDevolucao() { //FALTA FAZER O DEVOLUÇÃO, ESTUDAR O MELHOR JEITO.

		$sql = "SELECT COUNT(*) as c FROM cadastro_aparelho WHERE situacao = 'Devolucao'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){

			$sql = $sql->fetch();
			return $sql['c'];
		}else{

			return 0;
		}
	}

	public function verificarLogin($dados){

		$email = $dados['email'];
		$senha = md5($dados['senha']);

		$stmt= $this->db->prepare("SELECT * FROM usuarios WHERE email=:email AND senha=:senha");
		$stmt->bindValue(":email", $email);
		$stmt->bindValue(":senha", $senha);

		$stmt->execute();

		

		if($stmt->rowCount() > 0){
			$row = $stmt->fetch();

			$_SESSION['nome'] = $row['nome'];
			
			
			return $row;
		}else{

			
			return $row = 'semLogin';
		}

	}
}