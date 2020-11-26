{include file="header.tpl"}
		    

	<div class="container">

		<button type="button" class="btn btn-primary logout"><a class="btn-text" href="logout/">Logout</a></button>


	<div class="container">
		<h1>Dar permisos</h1>
		<form action="UsersPermits" method="post">
			<div class="row align-items-end">
				<div class="col-md-6">
					<select name="userNombre" class="form-control">
				      	<option value="0"  hidden>--Seleccionar--</option>
					    {foreach from = $users item=user}
						    <option>{$user->nombre}</option>
						{/foreach}
				    </select>
			    </div>
			    <div class="col-md-2 form-check-inline">
		  			<label class="col-md-6 form-check-inline">
		    			<input type="radio" class="form-check-input" value="admin" name="radioPermiso">Admin
		  			</label>
				</div>
				<div class="col-md-2 form-check-inline">
		  			<label class="col-md-6 form-check-inline">
		    			<input type="radio" class="form-check-input" value="user" name="radioPermiso">User
		  			</label>
				</div>

		    </div>

			<button type="submit" class="btn btn-primary">Confirmar cambios</button>
		</form>	  

	</div>

	<div class="container">
		<ul class="list-group">
	  		<h1 class="titulo">Lista de Usuarios</h1>
	      	{foreach from = $users item=user}
	  			<li class="list-group-item list-group-item-success">{$user->nombre}<button type="button" class="btn btn-danger"> <a href="deleteUser/{$user->id_usuario}">Borrar</a></button></li>      		
	     	{/foreach}
	 	</ul>
 	</div>

 	<div class="container">
      	<ul class="list-group">
      		<h1 class="titulo">Listado de items</h1>
          	{foreach from = $products item=product}
            
      			<li class="list-group-item list-group-item-success"><p>El producto es {$product->nombre}</p>{$product->marca} <button type="button" class="btn btn-warning"> <a href="detalle/{$product->id_producto}">Detalle</a></button></li>      		
         	{/foreach}
     	</ul>

     	<h1 class="titulo">Listado de Categorias</h1>
      	{foreach from = $categorias item=categoria}
    		<button type="button" class="btn btn-danger"><a class="btn-text" href="ordenar/{$categoria->id_categoria}">Filtrar por {$categoria->nombre}</a></button>
    	{/foreach}

    </div>

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

	<div class="container">
		<ul class="list-group">
	  		<h1 class="titulo">Lista de categorias</h1>
	      	{foreach from = $categorias item=categoria}
	  			<li class="list-group-item list-group-item-success">{$categoria->nombre}<button type="button" class="btn btn-danger"> <a href="deleteCategories/{$categoria->id_categoria}">Borrar</a></button><button type="button" class="btn btn-warning"> <a href="editCategories/{$categoria->id_categoria}">Editar</a></button></li>      		
	     	{/foreach}
	 	</ul>
 	</div>
 	<div class="container">
			<h1 class="titulo">Agregar Categorias</h1>
		      <form action="insertCategories" method="post">
		          <div class="form-group">
		         
		            <label for="categoria">Nombre de nueva categoria</label>
		            <input class="form-control" id="categoria" name="input_categoria">
		          
		          </div>
		 
		          
		          <button type="submit" class="btn btn-primary">Agregar</button>
		        </form>
		</div>

{include file="footer.tpl"}	
