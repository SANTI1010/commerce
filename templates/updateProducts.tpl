{include file="header.tpl"}
			<div class="container">
		      <form action="updateProducts/{$id}" method="post">
		          <div class="form-group">
		          	<label for="inputState">Categorias</label>
				      <select name="categoria" class="form-control">
				      	<option id="optionOculto">{$product->nombre}</option>
					    {foreach from = $categorias item=categoria}
						    <option value="{$categoria->id_categoria}">{$categoria->nombre}</option>
						{/foreach}
				      </select>
		            <label for="marca">Marca</label>
		            <input class="form-control" id="marca" value="{$product->marca}" name="update_marca" aria-describedby="emailHelp">		         
		          </div>
		          <div class="form-group">
		            <label for="description">Talle</label>
		            <input class="form-control" id="description" value="{$product->talle}" name="update_talle">
		          </div>
		          <div class="form-group">
		              <label for="priority">Precio</label>
		              <input class="form-control" id="priority" value="{$product->precio}" name="update_precio">
		            </div>
		          
		          <button type="submit" class="btn btn-primary">Agregar</button>
		        </form>
		    </div>

{include file="footer.tpl"}		