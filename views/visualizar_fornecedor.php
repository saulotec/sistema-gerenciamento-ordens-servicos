<div class="asidevisual">
     <p>Visualizar Fornecedor:</p>    
    <form method="POST" action="<?php echo BASE_URL;?>">                      
            <label>
                Nome:<br/>
                <input type="text" id="nome" name="nome" placeholder="Nome completo" value="<?php if(isset($infoFornecedor)){ echo $infoFornecedor['nome'];} ?>" disabled/>
            </label>

            <label>
                Endereço:<br/>
                <input type="text"  name="endereco" disabled  value="<?php if(isset($infoFornecedor)){ echo $infoFornecedor['endereco'];}?>" />
            </label><br/>
            

            <label>
                Complemento:<br/>
                <input type="text" id="complemento" name="complemento" disabled value="<?php if(isset($infoFornecedor)){ echo $infoFornecedor['complemento'];} ?>" />
            </label>

            <label>
                Telefone:<br/>
                <input type="text" id="telefone" name="telefone" disabled value="<?php if(isset($infoFornecedor)){ echo $infoFornecedor['telefone'];} ?>" />
            </label><br/>                   

            <label>
                WhatsApp:<br/>
                <input type="text"  name="whatsapp" disabled value="<?php if(isset($infoFornecedor)){ echo $infoFornecedor['whatsapp'];} ?>" />
            </label>

            <label>
                Site:<br/>
                <input type="text"  name="site" disabled value="<?php if(isset($infoFornecedor)){ echo $infoFornecedor['site'];} ?>" />
            </label>

            <label>
                Mercadorias Ofertadas:<br/>
                <textarea type="text" class="infoap" disabled id="mercadorias" name="mercadorias" ><?php if(isset($infoFornecedor)){ echo $infoFornecedor['mercadorias'];} ?></textarea>
            </label></br> 

            <label>
                Informações adicionais:<br/>
                <textarea type="text" class="infoap" disabled id="informacoes_add" name="informacoes_add"><?php if(isset($infoFornecedor)){ echo $infoFornecedor['informacoes_add'];} ?></textarea>
            </label></br>   

            <a id="aa" href="<?php echo BASE_URL;?>fornecedor/buscarfvs">Voltar</a>    
            
        </form>
        
</div>