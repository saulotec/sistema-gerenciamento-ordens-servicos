<div class="asidevisual">
     <p>Cadastrar Produto no Banco de Dados:</p>    
    <form method="POST" action="<?php echo BASE_URL;?>produto/cadastrado">                      
            <label>
                Nome do produto:<br/>
                <input type="text" id="nome" name="nome" placeholder="Nome completo" required/>
            </label>

            <label>
                Fornecedor:<br/>    
                <input type="text" id="nome" name="id_fornecedor" placeholder="Nome completo" required/>
            </label>

            <label>
                Marca:<br/>
                <input type="text"   name="marca" required />
            </label>
            

            <label>
                modelo:<br/>
                <input type="text" id="modelo" name="modelo"  />
            </label><br/> 

            <label>
                valor:<br/>
                <input type="text" id="valor" name="valor"  />
            </label>                  

            <label>
                Quantidade:<br/>
                <input type="text"  name="quantidade" />
            </label>

            <label>
                Data da Compra:<br/>
                <input type="date"  name="data_compra" required/>
            </label>           

            <label>
                Informações adicionais:<br/>
                <textarea type="text" class="infoap" id="informacoes_add" name="informacoes_add" ></textarea>
            </label></br>   

            <input type="submit" value="cadastrar"/>    
            
        </form><br/><br/>


        <?php if(isset($ProdutoCadastrado) && $ProdutoCadastrado !=''): ?>         
                
            <span>Produto cadastrado com sucesso, número de indentificação: <?php if(isset($ProdutoCadastrado['id'])){echo $ProdutoCadastrado['id'];} ?> </span><br/>
            <span>Nome do Produto cadastrado: <?php if(isset($ProdutoCadastrado['nome'])){echo $ProdutoCadastrado['nome'];} ?></span><br/>          
            <a id="aa" href="<?php echo BASE_URL;?>produto/cadastrar">Ok</a>
               
        <?php endif; ?>
        
        <?php if(isset($jacadastrado) && $jacadastrado == true):?>

            <span> Produto já tem cadastro no sistema com o número de identificação: <?php echo $_SESSION['CD']; ?>, vá em editar e acrescente a quantidade.</span><br/>
            <a id="aa" href="<?php echo BASE_URL;?>produto/cadastrar">Ok</a>

        <?php endif; ?>
</div>