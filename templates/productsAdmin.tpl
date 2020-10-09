{include file="header.tpl"}
		    
	

	<div class="container">

		<button type="button" class="btn btn-primary"><a class="btn-text" href="logout/">Logout</a></button>

  	<ul class="list-group">
  		<h1 class="titulo">Lista de items</h1>
      	{foreach from = $products item=product}
  			<li class="list-group-item list-group-item-success">{$product->marca}<span class="badge badge-primary badge-pill">{$product->talle}</span> <button type="button" class="btn btn-danger"> <a href="delete/{$product->id_producto}">Borrar</a></button><button type="button" class="btn btn-warning"> <a href="editProducts/{$product->id_producto}">Editar</a></button></li>      		
     	{/foreach}
 	</ul>

</div>


<div class="container">
	<h1 class="titulo">Agregar items</h1>
		      <form action="insert" method="post">
		          <div class="form-group">
		          	<label for="inputState">Categorias</label>
				      <select name="categoria" class="form-control">
				      	<option id="optionOculto" value="0"  hidden>--Seleccionar--</option>
					    {foreach from = $categorias item=categoria}
						    <option value="{$categoria->id_categoria}">{$categoria->nombre}</option>
						{/foreach}
				      </select>
		            <label for="marca">Marca</label>
		            <input class="form-control" id="marca" name="input_marca" aria-describedby="emailHelp">
		            <small id="emailHelp" class="form-text text-muted">Titulo de la Tarea</small>
		          </div>
		          <div class="form-group">
		            <label for="description">Talle</label>
		            <input class="form-control" id="description" name="input_talle">
		          </div>
		          <div class="form-group">
		              <label for="priority">Precio</label>
		              <input class="form-control" id="priority" name="input_precio">
		            </div>
		          
		          <button type="submit" class="btn btn-primary">Agregar</button>
		        </form>
		    </div>





{include file="footer.tpl"}		

