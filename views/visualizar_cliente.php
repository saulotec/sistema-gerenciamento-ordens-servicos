<div class="asidevisual">
  <p>Visualizar Cliente cadastrado:</p>
    <form method="POST" action="">                      
            <label>
                Nome:<br/>
                <input type="text" id="nome" name="nome" disabled placeholder="Nome completo" value="<?php if(isset($infoCliente)){ echo $infoCliente['nome'];} ?>" required/>
            </label>

            <label>
                CEP:<br/>
                <input type="text"  id="rg_cpf" name="rg_cpf" disabled placeholder="000.000.000-00" value="<?php if(isset($infoCliente)){ echo $infoCliente['rg_cpf'];} ?>" pattern="\d{3}.\d{3}.\d{3}-\d{2}" maxlength="14"/>
            </label><br/>
            

            <label>
                Endereço:<br/>
                <input type="text" id="endereco" name="endereco" disabled value="<?php if(isset($infoCliente)){ echo $infoCliente['endereco'];} ?>" required />
            </label></br>

            <label>
                Data de nasc.:<br/>
                <input type="date" id="nascimento" name="nascimento" disabled value="<?php if(isset($infoCliente)){ echo $infoCliente['nascimento'];} ?>"  />
            </label>

            <label>
                E-mail:<br/>
                <input type="email" id="email" name="email"  disabled value="<?php if(isset($infoCliente)){ echo $infoCliente['email'];} ?>"  />
            </label><br/>

            

            <label>
                WhatsApp:<br/>
                <input type="text" type="text" name="whatsapp" disabled value="<?php if(isset($infoCliente)){ echo $infoCliente['whatsapp'];} ?>" />
            </label>

            <label>
                Telefone:<br/>
                <input type="text" type="tel" name="telefone" disabled value="<?php if(isset($infoCliente)){ echo $infoCliente['telefone'];} ?>" />
            </label></br>

            <label>
                Informações adicionais:<br/>
                <textarea type="text" class="infoap" id="informacoes_add" disabled name="informacoes_add" ><?php if(isset($infoCliente)){ echo $infoCliente['informacoes_add'];} ?></textarea>
            </label></br>   

            <a id="aa" href="<?php echo BASE_URL;?>cliente/buscarcvs">Voltar</a>             
            
        </form>
</div>