{include file="header.tpl"}


	<div class="container">

	  	<ul class="list-group">

	      	{foreach from = $detalle item=detalles}

	      		<li class="list-group-item list-group-item-success">{$detalles->marca}</li>
	      		<li class="list-group-item list-group-item-success">{$detalles->talle}</li>
	      		<li class="list-group-item list-group-item-success">{$detalles->precio}</li>
	      
	      		
	     	{/foreach}

	 	</ul>

	 	<a href="volver">Volver</a>

	</div>

{include file="footer.tpl"}		

