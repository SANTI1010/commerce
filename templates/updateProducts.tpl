{include file="header.tpl"}



			<p>{$id}</p>
	
			<div class="container">
		      <form action="updateProducts/{$id}" method="post">
		          <div class="form-group">
		          	<label for="inputState">Categorias</label>
				    <input class="form-control" id="description" name="update_categoria">
		           
		            <label for="marca">Marca</label>
		            <input class="form-control" id="marca" name="update_marca" aria-describedby="emailHelp">
		         
		          </div>
		          <div class="form-group">
		            <label for="description">Talle</label>
		            <input class="form-control" id="description" name="update_talle">
		          </div>
		          <div class="form-group">
		              <label for="priority">Precio</label>
		              <input class="form-control" id="priority" name="update_precio">
		            </div>
		          
		          <button type="submit" class="btn btn-primary">Agregar</button>
		        </form>
		    </div>

{include file="footer.tpl"}		