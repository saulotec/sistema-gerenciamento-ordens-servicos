<div class="asidevisual">
     <p>Editar Fornecedor no Banco de Dados:</p>    
    <form method="POST" action="<?php echo BASE_URL;?>fornecedor/editado">                      
            <label>
                Nome:<br/>
                <input type="text" id="nome" name="nome" placeholder="Nome completo" value="<?php if(isset($infoFornecedor)){ echo $infoFornecedor['nome'];} ?>" required/>
            </label>

            <label>
                Endereço:<br/>
                <input type="text"  name="endereco" required value="<?php if(isset($infoFornecedor)){ echo $infoFornecedor['endereco'];}?>" />
            </label><br/>
            

            <label>
                Complemento:<br/>
                <input type="text" id="complemento" name="complemento" value="<?php if(isset($infoFornecedor)){ echo $infoFornecedor['complemento'];} ?>" />
            </label>

            <label>
                Telefone:<br/>
                <input type="text" id="telefone" name="telefone" value="<?php if(isset($infoFornecedor)){ echo $infoFornecedor['telefone'];} ?>" />
            </label><br/>                   

            <label>
                WhatsApp:<br/>
                <input type="text"  name="whatsapp" value="<?php if(isset($infoFornecedor)){ echo $infoFornecedor['whatsapp'];} ?>" />
            </label>

            <label>
                Site:<br/>
                <input type="text"  name="site" value="<?php if(isset($infoFornecedor)){ echo $infoFornecedor['site'];} ?>" />
            </label>

            <label>
                Mercadorias Ofertadas:<br/>
                <textarea type="text" class="infoap" id="mercadorias" name="mercadorias" ><?php if(isset($infoFornecedor)){ echo $infoFornecedor['mercadorias'];} ?></textarea>
            </label></br> 

            <label>
                Informações adicionais:<br/>
                <textarea type="text" class="infoap" id="informacoes_add" name="informacoes_add" ><?php if(isset($infoFornecedor)){ echo $infoFornecedor['informacoes_add'];} ?></textarea>
            </label></br>   

            <input type="submit" value="Editar"/>    
            
        </form>
        
</div>