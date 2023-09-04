<div class="asidevisual">
     <p>Cadastrar Fornecedor no Banco de Dados:</p>    
    <form method="POST" action="<?php echo BASE_URL;?>fornecedor/cadastrado">                      
            <label>
                Nome:<br/>
                <input type="text" id="nome" name="nome" placeholder="Nome completo" required/>
            </label>

            <label>
                Endereço:<br/>
                <input type="text"  name="endereco" required />
            </label><br/>
            

            <label>
                Complemento:<br/>
                <input type="text" id="complemento" name="complemento"  />
            </label>

            <label>
                Telefone:<br/>
                <input type="text" id="telefone" name="telefone"  />
            </label><br/>                   

            <label>
                WhatsApp:<br/>
                <input type="text"  name="whatsapp" />
            </label>

            <label>
                Site:<br/>
                <input type="text"  name="site" />
            </label>

            <label>
                Mercadorias Ofertada:<br/>
                <textarea type="text" class="infoap" id="mercadorias" name="mercadorias" ></textarea>
            </label></br> 

            <label>
                Informações adicionais:<br/>
                <textarea type="text" class="infoap" id="informacoes_add" name="informacoes_add" ></textarea>
            </label></br>   

            <input type="submit" value="cadastrar"/>    
            
        </form><br/><br/>


        <?php if(isset($fornecedorCadastrado) && $fornecedorCadastrado !=''): ?>
        

         
                
          <span>Fornecedor cadastrado com sucesso, número de indentificação: <?php if(isset($fornecedorCadastrado['id'])){echo $fornecedorCadastrado['id'];} ?> </span><br/>
          <span>Nome do Fornecedor cadastrado: <?php if(isset($fornecedorCadastrado['nome'])){echo $fornecedorCadastrado['nome'];} ?></span><br/>          
          <a id="aa" href="<?php echo BASE_URL;?>fornecedor/cadastrar">Ok</a>
           
        <?php endif; ?>
        
        <?php if(isset($jacadastrado) && $jacadastrado == true):?>
        <span> Fornecedor já tem cadastro no sistema com o número de identificação: <?php echo $_SESSION['CD']; ?></span><br/>
        <a id="aa" href="<?php echo BASE_URL;?>fornecedor/cadastrar">Ok</a>
        <?php endif; ?>
</div>