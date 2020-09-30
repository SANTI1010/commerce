{include file="header.tpl"}



	<div class="container">

  	<ul class="list-group">

      	{foreach from = $categories item=categorie}

      			<li class="list-group-item list-group-item-success" >{$categorie->marca}<span class="badge badge-primary badge-pill">{$categorie->talle}</span> <button type="button" class="btn btn-danger"> <a href="delete/{$product->id_producto}">Borrar</a></button></li>
      		
     	{/foreach}

 	</ul>

 	 	<a href="volver">Volver</a>


</div>

{include file="footer.tpl"}		

