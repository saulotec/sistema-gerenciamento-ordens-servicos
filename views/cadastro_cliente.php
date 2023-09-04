<div class="asidevisual">
     <p>Cadastrar Cliente no Banco de Dados:</p>    
    <form method="POST" action="<?php echo BASE_URL;?>cliente/cadastrado">                      
            <label>
                Nome:<br/>
                <input type="text" id="nome" name="nome" placeholder="Nome completo" required/>
            </label>

            <label>
                CPF:<br/>
                <input type="text"  id="rg_cpf" name="rg_cpf"  placeholder="000.000.000-00" pattern="\d{3}.\d{3}.\d{3}-\d{2}" maxlength="14"/>
            </label><br/>
            

            <label>
                Endereço:<br/>
                <input type="text" id="endereco" name="endereco" required />
            </label></br>

            <label>
                Data de nasc.:<br/>
                <input type="date" id="nascimento" name="nascimento"  />
            </label>

            <label>
                E-mail:<br/>
                <input type="email" id="email" name="email"  />
            </label><br/>

            

            <label>
                WhatsApp:<br/>
                <input type="text" name="whatsapp" />
            </label>

            <label>
                Telefone:<br/>
                <input type="text" type="tel" name="telefone" />
            </label></br>

            <label>
                Informações adicionais:<br/>
                <textarea type="text" class="infoap" id="informacoes_add" name="informacoes_add" ></textarea>
            </label></br>   

            <input type="submit" value="cadastrar"/>    
            
        </form><br/><br/>


        <?php if(isset($clienteCadastrado) && $clienteCadastrado !=''): ?>
        

         
                
          <span>Cliente cadastrado com sucesso, número de indentificação: <?php if(isset($clienteCadastrado['id'])){echo $clienteCadastrado['id'];} ?> </span><br/>
          <span>Nome do Cliente cadastrado: <?php if(isset($clienteCadastrado['nome'])){echo $clienteCadastrado['nome'];} ?></span>          

           
        <?php endif; ?>
        <?php if(isset($cadastrado) && $cadastrado == true):?>
        <span> Cliente já tem cadastro no sistema com o número de identificação: <?php echo $_SESSION['ID']; ?></span>
        <?php endif; ?>
</div>