<div id="lado_esquerdo">
    
    <div class="asideform">
        <p>Dados para abertura da Ordem de Serviço:</p>
        <form method="POST" action="<?php echo BASE_URL;?>ordem/cadastroc">                      
            <label>
                Nome:<br/>
                <input type="text" id="nome" name="nome" placeholder="Nome completo" required/>
            </label>

            <label>
                CPF:<br/>
                <input type="text"  id="rg_cpf" name="rg_cpf" placeholder="000.000.000-00" pattern="\d{3}.\d{3}.\d{3}-\d{2}" maxlength="14"/>
            </label><br/>
            

            <label>
                Endereço:<br/>
                <input type="text" id="endereco" name="endereco" required/>
            </label></br>

            <label>
                Data de nasc.:<br/>
                <input type="date" id="nascimento" name="nascimento"/>
            </label>

            <label>
                E-mail:<br/>
                <input type="email" id="email" name="email"/>
            </label><br/>

            

            <label>
                WhatsApp:<br/>
                <input type="text" type="text" name="whatsapp"/>
            </label>

            <label>
                Telefone:<br/>
                <input type="text" type="tel" name="telefone"/>
            </label></br>

            <label>
                Informações adicionais:<br/>
                <textarea type="text" class="infoa" id="informacoes_add" name="informacoes_add"></textarea>
            </label></br>   
            
            <label>                           
                <input  type="submit" id="cadastro" value="cadastrar"/>
            </label>
            
        </form>

    </div>
</div>
<div id="lado_direito">
    
    <div class="asideform_dir">
        <p>Buscar por cliente no banco de dados:</p>
        <form method="POST" action="<?php echo BASE_URL;?>ordem/clientec">                      
            <label>
                Nome:<br/>
                <input type="text" name="nome"  id="jacad" placeholder="Nome completo"/>
            </label><br/>

            <label>
                Número do Cliente:<br/>
                <input type="number" name="id" id="jacad" />
            </label><br/>

            <label>                           
                <input type="submit" value="Buscar"/>

            </label>
        </form>
        <?php if(isset($info) && !empty($info) && $info != 'nCad'):?>
            <p>Cliente encontrado/cadastrado:</p>
            <form method="POST" action="<?php echo BASE_URL;?>ordem/formap">
            <label>
            Nome:<br/>
            <input type="text" name="nome" value="<?php echo $info['nome'];?>" disabled/>
            </label><br/>
            <label>
            Endereço:<br/>
            <input type="text" name="endereco" value="<?php echo $info['endereco'];?>" disabled/>
            </label><br/>

            <input type="hidden" name="nome" value="<?php echo $info['nome'];?>"/>

            <input type="hidden" name="id" value="<?php echo $_SESSION['ID'];?>"/>

            <input type="submit" value="Confirmar" />
            
            </form>
            
        <?php endif;?>
        <?php if(isset($info) && $info == "nCad"):?>
            <p>Usuário não encontrado em nossos cadastros</p>
        <?php endif;?>
        
    </div>
</div>