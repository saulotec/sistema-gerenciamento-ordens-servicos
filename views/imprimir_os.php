<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir Ordem de Serviço</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/imprimir.css"/>
</head>
<body>
    <div>
        <header>
        
        	 <img src="<?php echo BASE_URL;?>assets/images/logo-completo.png" widht="150px" height="100px">
        
        	 <p>ORDEM DE SERVIÇO </br>
        	 L&S Assistência Técnica</br>    	 
        	 Endereço: Rua Manoel Leme da Silva nº 595</br>
        	 CEP.: 08122-110</br>
        	 Bairro: Jardim das Oliveira</br>
        	</p>

        </header>
        <div id="corpo">
        	<h1>Ordem de serviço número: <?php if(isset($_SESSION['id_ordem'])){echo $_SESSION['id_ordem'];}?></h1>
            <p>Número de identificação do cliente: <b><?php echo $_SESSION['ID'];?></b><br/>
            Nome do cliente: <b><?php echo $info_cliente['nome'];?></b><br/>
            Endereço: <b><?php echo $info_cliente['endereco'];?></b><br/>
            CEP: <b><?php echo $info_cliente['rg_cpf'];?></b><br/>
            Telefone: <b><?php echo $info_cliente['telefone'];?></b><br/>
            WhatsApp: <b><?php echo $info_cliente['whatsapp'];?></b><br/>
            E-mail: <b><?php echo $info_cliente['email'];?></b><br/>
            Informaçãos adicionais: <b><?php echo $info_cliente['informacoes_add'];?></b></p>


            <p>Marca do Aparelho: <b><?php echo $info_aparelho['marca'];?></b><br/>
            Modelo do Aparelho: <b><?php echo $info_aparelho['modelo'];?></b><br/>
            Defeitos reclamado do aparelho: <b><?php echo $info_aparelho['defeito'];?></b><br/>
            Senha alfanumérica e ou senha padrão: <b><?php echo $info_aparelho['senha'];?></b><br/>       
            Data de entrada: <b><?php echo $info_aparelho['data_entrada'];?></b><br/>
            Data de saída:______________________________<br/>
            Tempo de Garantia: <b><?php echo $info_aparelho['garantia'];?> mês(es)</b><br/>   
            Assinatura do Cliente:______________________________ <br/>
            Assinatura da Assistência técnica:______________________________</p>
            <a href="<?php echo  BASE_URL;?>ordem/concluida">Finalizar OS</a>   	
        </div>
    </div>

    
</body>
</html>

	
 
