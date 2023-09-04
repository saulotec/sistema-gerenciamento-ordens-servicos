        
    
        

    <div id="paiordem">
        <div id="topo">
            <p><?php $date = new DateTime(); echo $date->format('d/m/Y'); ?> <br/>
            <h1>Dados informativos referente as Ordens de Serviços:</h1>
        </div> 
    	<div id="ordem">
    	<p>OS Geral:<br/> <b><?php  if(isset($getQuantidade)){ echo $getQuantidade; }?></b></p>
    	</div>

        <div id="ordem">
        <p>Clientes cadastrados:<br/> <b><?php  if(isset($Clientes)){ echo $Clientes; }?></b></p>
        </div>

    	<div id="ordem">
    	<p>Para Orçamento: <br/><b><?php  if(isset($getOrcamento)){ echo $getOrcamento; }?></b></p>
    	</div>

         <div id="ordem">
        <p>Orçamento Pronto:<br/><b><?php  if(isset($getOrcamentoPronto)){ echo $getOrcamentoPronto; }?></b></p>
        </div>

    	<div id="ordem">
    	<p>Orçamento Aprovado:<br/><b> <?php  if(isset($getOrcamentoAprovado)){ echo $getOrcamentoAprovado; }?></b></p>
    	</div>

    	<div id="ordem">
    	<p>Pronto:<br/><b><?php  if(isset($getPronto)){ echo $getPronto; }?></b></p>
    	</div> 

        <div id="ordem">
        <p>Entregue e pago:<br/><b><?php  if(isset($getEntreguePago)){ echo $getEntreguePago; }?></b></p>
        </div>
       
        <div id="ordem">
        <p>Sem reparo:<br/><b><?php  if(isset($getSemReparo)){ echo $getSemReparo; }?></b></p>
        </div>        

         <div id="ordem">
        <p>Entregue sem reparo:<br/><b><?php  if(isset($getEntregueSemReparo)){ echo $getEntregueSemReparo; }?></b></p>
        </div>

        <div id="ordem">
        <p>Em Garantia:<br/><b><?php  if(isset($getGarantia)){ echo $getGarantia; }?></b></p>
        </div>

         <div id="ordem">
        <p>Devolução:<br/><b><?php  if(isset($getDevolucao)){ echo $getDevolucao; }?></b></p>
        </div>

       

        
   </div>
