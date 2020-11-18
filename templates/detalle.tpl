{include file="header.tpl"}


	<div class="container col-md-7" >
		<div class="row">
			<div class="col-md-6">
			  	<ul class="list-group">
			  		

			      		<li class="list-group-item list-group-item-success">La categoria es: {$detalle->nombre}</li>
			      		<li class="list-group-item list-group-item-success">La marca es: {$detalle->marca}</li>
			      		<li class="list-group-item list-group-item-success">El talle es: {$detalle->talle}</li>
			      		<li class="list-group-item list-group-item-success">El precio es: ${$detalle->precio}</li>
			 	</ul>
		 	</div>

		 	<div class="col-md-4">
		<form action="InsertComments/{$detalle->id_producto}"> 		
		 		<label>Comentarios</label>
		 		<textarea placeholder="Escribir comentario" id="comment-list"></textarea>
		 	</div>	
		 	<div class="col-md-2">
		 		<label>Puntuacion</label>
		 		<select>
		 			<option>1</option>
		 			<option>2</option>
		 			<option>3</option>
		 			<option>4</option>
		 			<option>5</option>
		 		</select>
		 	</div>	
		</form> 	

		 	<a href="volver">Volver</a>
		</div> 	
	</div>

<script src="js/comments.js"></script>
{include file="footer.tpl"}		

