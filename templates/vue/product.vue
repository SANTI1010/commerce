{literal}
<div id="vue-product">

	<ul id="product-list" class="list-group" >
		<li
		v-for="product in products"
		 class="list-group-item list-group-item-success">{{product.marca}} - {{product.precio}}

			<button id="btn-comment" :data="product.id_producto" class="btn btn-warning">Eliminar</button>
		</li>
	</ul>

</div>
{/literal}