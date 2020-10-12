{include file="header.tpl"}


	<div class="container">

	  	<ul class="list-group">

	      	{foreach from = $detalle item=detalles}
	      		<li class="list-group-item list-group-item-success">La categoria es: {$detalles->nombre}</li>
	      		<li class="list-group-item list-group-item-success">La marca es: {$detalles->marca}</li>
	      		<li class="list-group-item list-group-item-success">El talle es: {$detalles->talle}</li>
	      		<li class="list-group-item list-group-item-success">El precio es: ${$detalles->precio}</li>
	      
	      		
	     	{/foreach}

	 	</ul>

	 	<a href="volver">Volver</a>

	</div>

{include file="footer.tpl"}		

