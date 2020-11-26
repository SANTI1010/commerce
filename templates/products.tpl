{include file="header.tpl"}
               
    {if $rol != NULL}           
        <button type="button" class="btn btn-primary logout"><a class="btn-text" href="logout/">Logout</a></button>
    {else}
	   <button type="button" class="btn login"><a class="btn-text" href="login/">Login</a></button><br>
    {/if}    


    <!---------------------->
    <!--------ADMIN--------->
    <!---------------------->

    {if $rol == 'admin'} 
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
    {/if}    


    <!---------------------->
    <!--------USER--------->
    <!---------------------->
    {if $rol == 'user'}    
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
            <h1 class="titulo">Agregar Categorias</h1>
              <form action="insertCategories" method="post">
                  <div class="form-group">
                 
                    <label for="categoria">Nombre de nueva categoria</label>
                    <input class="form-control" id="categoria" name="input_categoria">
                  
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
  
 
    
    {/if}
  <!--  <button type="button" class="btn login"><a class="btn-text" href="products-csr/">csr</a></button>-->
	<!--
    <section>
		<div class="contenedor">
			<h1 class="titulo">Especialista en Voleyball</h1>
			<p>En Voley en Casa tenes tu tienda online pensada para ofrecerte los mejores artículos de voley para tu seguridad ya sea entrenando o en partido!</p>            

			<h2 class="subtitulo">La importancia de la proteccion de rodillas y codos</h2>
			
			<p>Cuando empezas a jugar al volleyball, tu cuerpo todavía no está acostumbrado a los golpes que vas a recibir, así que, al principio es importante que tengas protectores para los codos y las rodillas. Las mangas son una buena elección para aquellas personas que se preocupan mucho por sus brazos, o que tienen la piel demasiado sensible. Estas deben ser de licra, o algodón, y que deje transpirar bien a la piel. Algunas veces va a ser inevitable que tengas que lanzarte en plancha o de lado para alcanzar la pelota, y para esto estan las rodilleras, que te ayudaran a preparar tu cuerpo de los golpes y las caidas!.
			</p>
		</div>
	</section>
    -->
    {if $rol != 'admin' && $rol != 'user'}
        <div class="container">
            <h1 class="titulo">Listado de Categorias</h1>
            {foreach from = $categorias item=categoria}
                <button type="button" class="btn btn-danger"><a class="btn-text" href="ordenar/{$categoria->id_categoria}">Filtrar por {$categoria->nombre}</a></button>
            {/foreach}
        </div>  
    {/if}    

	<div class="container">
      	<ul class="list-group">
      		<h1 class="titulo">Listado de items</h1>
          	{foreach from = $products item=product}
            
      			<li class="list-group-item list-group-item-success"><p>El producto es {$product->nombre}</p>{$product->marca} <button type="button" class="btn btn-warning"> <a href="detalle/{$product->id_producto}">Detalle</a></button></li>      		
         	{/foreach}
     	</ul>
    </div>

   
	<section>
		<div class="contenedor">
			<h2 class="barraProductos">Productos</h2>
			<div class="listaProductos">
				<div class="productos">
					<a target="_blank" href="rodilleras.html">
						<img src="img/rodilleraMizuno.jpg">
						<h3>Rodilleras</h3>
					</a>
					<p class="centrarTexto">Disponemos de un gran stock de rodilleras protectoras con las mejores marcas para niños y adultos.</p>		
				</div>

				<div class="productos">
					<a target="_blank" href="mangas.html">
						<img src="img/mangasMizuno.jpg">
						<h3>Mangas</h3>
					</a>
					<p class="centrarTexto">Disponemos de un gran stock de mangas protectoras con las mejores marcas para niños y adultos.</p>
				</div>
			</div>
		</div>
	</section>

	<section>
         <div class="contenedor">
            <h2 class="barraProductos centrarTexto">Formulario de contacto</h2>
            <fieldset>
                <legend>Información personal</legend>
                <br>
                <form id="miForm">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" placeholder="Tu nombre">
                        <div class="errorNombre">
                            <span>Debe ingresar el nombre</span>
                        </div>
        
                    <label for="email">E-mail:</label>
                    <input type="text" id="email" placeholder="Tu correo electrónico">
                        <div class="errorEmail">
                            <span>Debe ingresar E-mail</span>
                        </div>
        
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" placeholder="Tu dirección">
                        <div class="errorDireccion">
                            <span>Debe ingresar la dirección</span>
                        </div>
        
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" placeholder="Tu teléfono">
                        <div class="errorTelefono">
                            <span>Debe ingresar el teléfono</span>
                        </div>
        
                    <div class="captcha">
                        <img src="img/captcha.jpg" id="mainCaptcha">
                        <div class="error">
                            <span>CAPTCHA INCORRECTO. Vuelva a intentarlo.</span>
                        </div>
                        <div class="correcto">
                            <span>INGRESO EXITOSO ! !</span>
                        </div>
                        <div class="vacio">
                            <span>Debe ingresar el captcha</span>
                        </div>  
                        <input type="text" id="ingresoCaptcha" placeholder="Ingresar captcha">  
                        <input id="btnValidar" type="submit" value="Enviar">
                    </div>
                </form>
            </fieldset>
        </div>
    </section>


{include file="footer.tpl"}		

