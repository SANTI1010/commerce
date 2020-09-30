{include file="header.tpl"}


	<div class="container">

  	<ul class="list-group">

      	{foreach from = $detalle item=detalles}

      		<p>{$detalles->marca}</p>
      		<p>{$detalles->talle}</p>
      		<p>{$detalles->precio}</p>
      
      		
     	{/foreach}

 	</ul>

 	 	<a href="volver">Volver</a>


</div>

{include file="footer.tpl"}		

