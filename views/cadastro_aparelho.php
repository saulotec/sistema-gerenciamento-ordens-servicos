<div id="cdaparelho">
    
    <div class="asideformap">
        <p>Cliente:</p>
        <label>
            Nome:<br/>
            <input type="text" disabled name="nome" value="<?php echo $info['nome'];?>"/>
        </label>
        
        <label>   
            Número de indentificação do cliente:<br/>
            <input type="number" disabled  name="id_cliente" value="<?php if(isset($_SESSION['ID'])){ echo $_SESSION['ID'];}?>"/>
        </label><br/>
        <hr/>
        <p>Informações do aparelho:</p>
        <form method="POST" action="<?php echo BASE_URL;?>ordem/cadastroa">                      
            <label>
                Marca:<br/>
                <input type="text"  id="marca" required name="marca"/>
            </label>

            <label>
                modelo:<br/>
                <input type="text"  id="modelo" name="modelo"/>
            </label><br/>

            <label>
                Acessórios que ficou na loja:<br/>
                <textarea class="infoap" id="ace" name="acessorio"></textarea> 
            </label></br>

            <label>
                Defeitos reclamado do aparelho:<br/>
                <textarea class="infoap" id="defeito" required name="defeito"></textarea> 
            </label></br>                            

            <label>
                Senha alfanumérica e ou senha padrão:<br/>
                <input type="text" id="senha"  required name="senha"/>
            </label><br/>

            

            <label>
                Tempo de garantia:<br/>
                <select id="garantia" name="garantia">
                    <option></option>
                    <option value="1" id="">1 mes</option>
                    <option value="2" id="">2 meses</option>
                    <option value="3" id="">3 meses</option>
                </select>
            </label>

            <label>
                Situação da OS:<br/>
                <select id="situ" name="situacao" required>
                    <option></option>
                    <option value="Orcamento">Orçamento</option>
                    <option value="Orcamento Pronto">Orçamento Pronto</option>
                    <option value="Aprovado">Aprovado</option>
                    <option value="Pronto">Pronto</option>
                    <option value="Sem reparo">Sem reparo</option>
                    <option value="Devolvido sem reparo">Devolvido sem reparo</option>
                    <option value="Entre e pago">Entre e pago</option>
                    <option value="Garantia">Garantia</option>
                    <option value="Devolução">Devolução</option>
                </select>
            </label></br>                         
                
            <label>
                Data de entrada:<br/>
                <input type="date" name="data_entrada" required/>
            </label>  
            
            <label>
                Data de entrega:<br/>
                <input type="date"  name="data_saida" />
            </label></br>  
            
            <label>                           
                <input type="submit" value="Enviar/cadastrar" />

            </label>
            
        </form>
        
        <a href="<?php echo BASE_URL;?>ordem/imprimirOS">Imprimir</a> 

    </div>
</div> 