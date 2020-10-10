{include file="header.tpl"}
	
			<div class="container">
		      <form action="updateCategories/{$id}" method="post">
		          <div class="form-group">
		            <label for="description">Nombre</label>
		            <input class="form-control" id="description" name="update_nombre">
		          </div>
		          
		          <button type="submit" class="btn btn-primary">Agregar</button>
		        </form>
		    </div>

{include file="footer.tpl"}		