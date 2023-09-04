<div class="asidevisual">
     <p>Editar Produto :</p>    
    <form method="POST" action="<?php echo BASE_URL;?>produto/editado">                      
            <label>
                Nome do produto:<br/>
                <input type="text" id="nome" name="nome" placeholder="Nome completo" required  value="<?php if(isset($infoProduto)){ echo $infoProduto['nome'];} ?>"/>
            </label>

            <label>
                Fornecedor:<br/>    
                <input type="text" id="nome" name="id_fornecedor" placeholder="Nome completo" value="<?php if(isset($infoProduto)){ echo $infoProduto['id_fornecedor'];} ?>" required/>
            </label>

            <label>
                Marca:<br/>
                <input type="text"   name="marca" required value="<?php if(isset($infoProduto)){ echo $infoProduto['marca'];} ?>" />
            </label>
            

            <label>
                modelo:<br/>
                <input type="text" id="modelo" name="modelo" value="<?php if(isset($infoProduto)){ echo $infoProduto['modelo'];} ?>" />
            </label><br/> 

            <label>
                valor:<br/>
                <input type="text" id="valor" name="valor" value="<?php if(isset($infoProduto)){ echo $infoProduto['valor'];} ?>"  />
            </label>                  

            <label>
                Quantidade:<br/>
                <input type="text"  name="quantidade" value="<?php if(isset($infoProduto)){ echo $infoProduto['quantidade'];} ?>"/>
            </label>

            <label>
                Data da Compra:<br/>
                <input type="date"  name="data_compra" value="<?php if(isset($infoProduto)){ echo $infoProduto['data_compra'];} ?>" required/>
            </label>           

            <label>
                Informações adicionais:<br/>
                <textarea type="text" class="infoap" id="info_adicionais" name="info_adicionais" ><?php if(isset($infoProduto)){ echo $infoProduto['info_adicionais'];} ?></textarea>
            </label></br>   

            <input type="submit" value="editar"/>    
            
        </form>
        
</div>