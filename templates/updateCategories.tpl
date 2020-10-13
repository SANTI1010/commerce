{include file="header.tpl"}
	
			<div class="container">
		      <form action="updateCategories/{$categorie->id}" method="post">
		          <div class="form-group">
		            <label for="description">Nombre</label>
		            <input class="form-control" id="description" value="{$categorie->nombre}" name="update_nombre">
		          </div>
		          
		          <button type="submit" class="btn btn-primary">Agregar</button>
		        </form>
		    </div>

{include file="footer.tpl"}		