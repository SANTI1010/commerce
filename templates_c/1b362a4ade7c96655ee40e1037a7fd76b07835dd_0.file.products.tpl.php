<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-26 04:56:58
  from 'C:\xampp\htdocs\web2\TPE_WEB2\templates\products.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6eadfad1dfc0_07806815',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b362a4ade7c96655ee40e1037a7fd76b07835dd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\TPE_WEB2\\templates\\products.tpl',
      1 => 1601088982,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f6eadfad1dfc0_07806815 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">

  	<ul class="list-group">

      	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>

      			<li class="list-group-item list-group-item-success" ><?php echo $_smarty_tpl->tpl_vars['product']->value->marca;?>
<span class="badge badge-primary badge-pill"><?php echo $_smarty_tpl->tpl_vars['product']->value->talle;?>
</span> <button type="button" class="btn btn-danger"> <a href="delete/<?php echo $_smarty_tpl->tpl_vars['product']->value->id_producto;
echo $_smarty_tpl->tpl_vars['product']->value->id_producto;?>
">Borrar</a></button></li>
      		
     	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

 	</ul>
</div>



<a href="ordenar/2">Seleccionar las Mangas</a>





<div class="container">
		      <form action="insert" method="post">
		          <div class="form-group">
		          	<label for="inputState">Categorias</label>
				      <select name="categoria" class="form-control">
				        <option value="1">Rodillera veeer</option>
				        <option value="2">Mangas verrr</option>
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




		    <header class="barra contenedor">
		<div class="encabezado">
				<img src="img/logo.jpg" alt="Logo página">
			<ul class="navegador">
				<li><a href="index.html">Inicio</a></li>
				<li><a target="_blank" href="rodilleras.html">Rodilleras</a></li>
				<li><a target="_blank" href="mangas.html">Mangas</a></li>
			</ul>
			<div class="btn_menu">
				<a href="#">MENÚ</a>
			</div>
		</div>
		<ul class="navegador_mobil">
				<li><a href="index.html">Inicio</a></li>
				<li><a target="_blank" href="rodilleras.html">Rodilleras</a></li>
				<li><a target="_blank" href="mangas.html">Mangas</a></li>
		</ul>
	</header>

	<section>
		<div class="contenedor">
			<h1 class="titulo">Especialista en Voleyball</h1>
			<p>En Voley en Casa tenes tu tienda online pensada para ofrecerte los mejores artículos de voley para tu seguridad ya sea entrenando o en partido!</p>            

			<h2 class="subtitulo">La importancia de la proteccion de rodillas y codos</h2>
			
			<p>Cuando empezas a jugar al volleyball, tu cuerpo todavía no está acostumbrado a los golpes que vas a recibir, así que, al principio es importante que tengas protectores para los codos y las rodillas. Las mangas son una buena elección para aquellas personas que se preocupan mucho por sus brazos, o que tienen la piel demasiado sensible. Estas deben ser de licra, o algodón, y que deje transpirar bien a la piel. Algunas veces va a ser inevitable que tengas que lanzarte en plancha o de lado para alcanzar la pelota, y para esto estan las rodilleras, que te ayudaran a preparar tu cuerpo de los golpes y las caidas!.
			</p>
		</div>
	</section>

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


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>		

<?php }
}
