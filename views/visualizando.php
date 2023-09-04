<div class="asidevisual">
    <h1> <p>OS de número: <?php if(isset($info['id']) && $info['id'] != ''){ echo $info['id'];} ?></p></h1>
    <form method="POST" action="<?php echo BASE_URL;?>">                      
        <label>
            Nome:<br/>
            <input type="text" id="nome" disabled name="nome" placeholder="Nome completo" value="<?php if(isset($infocliente) && $infocliente != ''){ echo $infocliente['nome'];} ?>" required/>
        </label>

        <label>
            CPF:<br/>
            <input type="text"  id="rg_cpf" disabled name="rg_cpf" placeholder="000.000.000-00" pattern="\d{3}.\d{3}.\d{3}-\d{2}" maxlength="14"  value="<?php if(isset($infocliente) && $infocliente != ''){ echo $infocliente['rg_cpf'];} ?>"/>
        </label><br/>
        

        <label>
            Endereço:<br/>
            <input type="text" id="endereco" disabled name="endereco" required  value="<?php if(isset($infocliente) && $infocliente != ''){ echo $infocliente['endereco'];} ?>"/>
        </label></br>

        <label>
            Data de nasc.:<br/>
            <input type="date" id="nascimento" disabled name="nascimento" value="<?php if(isset($infocliente) && $infocliente != ''){ echo $infocliente['nascimento'];} ?>"/>
        </label>

        <label>
            E-mail:<br/>
            <input type="email" id="email" disabled name="email" value="<?php if(isset($infocliente) && $infocliente != ''){ echo $infocliente['email'];} ?>"/>
        </label><br/>

        

        <label>
            WhatsApp:<br/>
            <input type="text" type="text" disabled name="whatsapp" value="<?php if(isset($infocliente) && $infocliente != ''){ echo $infocliente['whatsapp'];}?>"/>
        </label>

        <label>
            Telefone:<br/>
            <input type="text" type="tel" disabled name="telefone" value="<?php if(isset($infocliente) && $infocliente != ''){ echo $infocliente['telefone'];} ?>"/>
        </label></br>

        <label>
            Informações adicionais:<br/>
            <textarea type="text" class="infoap" disabled id="informacoes_add" name="informacoes_add"><?php if(isset($infocliente) && $infocliente != ''){ echo $infocliente['informacoes_add'];} ?></textarea>
        </label></br>          
        
    </form>
    <hr/><b>Aparelho:</b><hr/>
	<form method="POST" action="">                      
        <label>
            Marca:<br/>
            <input type="text"  id="marca" disabled value="<?php echo $info['marca'];?>" required name="marca"/>
        </label>

        <label>
            modelo:<br/>
            <input type="text"  id="modelo" disabled value="<?php echo $info['modelo'];?>" name="modelo"/>
        </label><br/>

        <label>
            Acessórios que ficou na loja:<br/>
            <textarea class="infoap" id="ace" disabled name="acessorio"  ><?php echo $info['acessorio'];?></textarea> 
        </label></br>

        <label>
            Defeitos reclamado do aparelho:<br/>
            <textarea class="infoap" id="defeito" disabled required name="defeito"><?php echo $info['defeito'];?></textarea> 
        </label></br>                            

        <label>
            Senha alfanumérica e ou senha padrão:<br/>
            <input type="text" id="senha"  required disabled name="senha"  value="<?php echo $info['senha'];?>"/>
        </label><br/>

        

        <label>
            Tempo de garantia:<br/>
            <select id="garantia" disabled name="garantia">
            	<option></option>
                <option value="1" id="" <?php echo ( $info['garantia'] == '1')? 'selected = "selected"':'';?>>1 mes</option>
                <option value="2" id="" <?php echo ( $info['garantia'] == '2')? 'selected = "selected"':'';?>>2 meses</option>
                <option value="3" id="" <?php echo ( $info['garantia'] == '3')? 'selected = "selected"':'';?>>3 meses</option>
            </select>
        </label>

        <label>
            Situação da OS:<br/>
            <select id="situ" name="situacao" disabled required>
                <option></option>
                <option  value="Orcamento" <?php echo ( $info['situacao'] == 'Orcamento')? 'selected = "selected"':'';?> >Orçamento</option>
                    <option value="Orcamento Pronto" <?php echo ( $info['situacao'] == 'Orcamento Pronto')? 'selected = "selected"':'';?>>Orçamento Pronto</option>
                    <option value="Aprovado" <?php echo ( $info['situacao'] == 'Aprovado')? 'selected = "selected"':'';?>>Aprovado</option>
                    <option value="Pronto" <?php echo ( $info['situacao'] == 'Pronto')? 'selected = "selected"':'';?>>Pronto</option>
                    <option value="Sem reparo" <?php echo ( $info['situacao'] == 'Sem reparo')? 'selected = "selected"':'';?>>Sem reparo</option>
                    <option value="Devolvido sem reparo" <?php echo ( $info['situacao'] == '6')? 'selected = "selected"':'';?>>Devolvido sem reparo</option>
                    <option value="Entre e pago" <?php echo ( $info['situacao'] == 'Entre e pago')? 'selected = "selected"':'';?>>Entre e pago</option>
                    <option value="Garantia" <?php echo ( $info['situacao'] == 'Garantia')? 'selected = "selected"':'';?>>Garantia</option>
                    <option value="Devolucao" <?php echo ( $info['situacao'] == 'Devolucao')? 'selected = "selected"':'';?>>Devolução</option>
            </select>
        </label><br/>

        <label>
            Campo para o técnico colocar Informações:<br/>
            <textarea class="infoap" id="infotec"  name="infotec" disabled><?php echo $info['infotec'];?></textarea> 
        </label></br>                     
            
        <label>
            Data de entrada:<br/>
            <input type="date" name="data_entrada" required disabled  value="<?php echo $info['data_entrada'];?>"/>
        </label>
        
        <label>
            Data de entrega:<br/>
            <input type="date"  name="data_saida" disabled value="<?php echo $info['data_saida'];?>" />
        </label></br>  
        
        <a id="aa" href="<?php echo BASE_URL;?>ordem/buscaros">Voltar</a>
        
    </form>
</div>