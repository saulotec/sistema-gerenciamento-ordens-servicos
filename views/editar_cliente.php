<div class="asidevisual">
   <p>Editar Cliente cadastrado:</p>
    <form method="POST" action="<?php echo BASE_URL;?>cliente/editado">                      
            <label>
                Nome:<br/>
                <input type="text" id="nome" name="nome" value="<?php if(isset($infoCliente)){ echo $infoCliente['nome'];} ?>"  placeholder="Nome completo" required/>
            </label>

            <label>
                CPF:<br/>
                <input type="text"  id="rg_cpf" name="rg_cpf" value="<?php if(isset($infoCliente)){ echo $infoCliente['rg_cpf'];} ?>"   placeholder="000.000.000-00" pattern="\d{3}.\d{3}.\d{3}-\d{2}" maxlength="14"/>
            </label><br/>
            

            <label>
                Endereço:<br/>
                <input type="text" id="endereco" name="endereco" value="<?php if(isset($infoCliente)){ echo $infoCliente['endereco'];} ?>"  required />
            </label></br>

            <label>
                Data de nasc.:<br/>
                <input type="date" id="nascimento" name="nascimento" value="<?php if(isset($infoCliente)){ echo $infoCliente['nascimento'];} ?>"   />
            </label>

            <label>
                E-mail:<br/>
                <input type="email" id="email" name="email" value="<?php if(isset($infoCliente)){ echo $infoCliente['email'];} ?>"   />
            </label><br/>

            

            <label>
                WhatsApp:<br/>
                <input type="text" type="text" name="whatsapp" value="<?php if(isset($infoCliente)){ echo $infoCliente['whatsapp'];} ?>"  />
            </label>

            <label>
                Telefone:<br/>
                <input type="text" type="tel" name="telefone" value="<?php if(isset($infoCliente)){ echo $infoCliente['telefone'];} ?>"  />
            </label></br>

            <label>
                Informações adicionais:<br/>
                <textarea type="text" class="infoap" id="informacoes_add" name="informacoes_add" ><?php if(isset($infoCliente)){ echo $infoCliente['informacoes_add'];} ?> </textarea>
            </label></br>   

            <input type="submit" value="alterar/salvar"/> <br/></br>

            <a id="aa" href="<?php echo BASE_URL;?>cliente/buscarce">Voltar</a>     
            
        </form>
</div>