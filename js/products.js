document.addEventListener('DOMContentLoaded',iniciar);

async function iniciar() {
	"use strict"

	let app = new Vue({
		el:'#vue-product',
		data : {
			products : [] 
		}
	});

	getProducts();	

	document.querySelector('#form-product').addEventListener('submit', e => {
		e.preventDefault();
		addProducts();		
	});


document.querySelector('#btn-comment').addEventListener('click', e => {
	alert("entra");
		//deleteProducts();		
	});



	function getProducts() {
		fetch('api/products')
			.then(response => response.json())
			.then(products => app.products = products)
			.catch(error => console.log(error));
	}

		//Inserto productos
	function addProducts() {
		const product = {
		    marca: document.querySelector('input[name="input_marca"]').value,
		    talle: document.querySelector('input[name="input_talle"]').value,
		    precio: document.querySelector('input[name="input_precio"]').value,
		    id_categoria: document.querySelector('input[name="input_categoria"]').value
		}

		fetch('api/products', {
			method: 'POST',
			headers : {"Content-Type" : "application/json"},
			body: JSON.stringify(product)
		})
			.then(response => response.json())
			.then(product => app.products.push(product))
			.catch(error => console.log(error));
	}





		//Elimino un producto pegandole a la API
	async function deleteProducts(e) {
		let div = document.querySelector('.mensajes');
		let idSeleccion = e.target.id;
		const url = 'api/products'+'/'+idSeleccion;
		try{
			div.innerHTML = "Borrando";
			let r = await fetch(url,{
				"method":"DELETE"
			});
		let json = await r.json();
			div.innerHTML = "Se borro correctamente";	
		} catch(e) {
			div.innerHTML="Farro al borrar";	
		}
		getProducts();
	}



		let btnEliminar = document.querySelectorAll(".btn-eliminar");
		console.log(btnEliminar);
		for(var i=0; i < btnEliminar.length; i++){
		      btnEliminar[i].addEventListener('click', async function (e) {
		        deleteProducts(e);
		      });
		    }
		}


/*
	async function getProducts() {
		const url = 'api/products';
		const container = document.querySelector('#product-list');
		const div = document.querySelector('.mensajes');

		try {
			let r = await fetch(url);
			let json = await r.json();
			let html = '';
			for(const elem of json) {
				html += `<li class="list-group-item list-group-item-success">${elem.marca} - ${elem.precio}<button class="btn-eliminar btn btn-warning" id='${elem.id_producto}'> Eliminar</button><button class="btn-editar btn btn-warning" id='${elem.id_producto}'> Editar</button></li>`;
			}
			container.innerHTML = html;
		} catch(e){
			div.innerHTML = "Error";
		}


		let allButtonsEditar = document.querySelectorAll(".btn-editar");
	    for(var i=0; i < allButtonsEditar.length; i++){
	      allButtonsEditar[i].addEventListener('click', async function(e) {
	        editar(e);
	      });
	    }

		let btnEliminar = document.querySelectorAll(".btn-eliminar");
		for(var i=0; i < btnEliminar.length; i++){
		      btnEliminar[i].addEventListener('click', async function (e) {
		        deleteProducts(e);
		      });
		    }
		}
	}	
	

	*/




	//Muestro los productos
/*	async function getProducts(){
		fetch('api/products')
			.then(response => response.json())
			.then(productos =>render(productos))
			.catch(error => console.log(error)); 
	}

	//Hago el HTML
	function render(products) {
		const container = document.querySelector('#product-list');

		container.innerHTML = "";

		for(let product of products) {
			container.innerHTML += `<li class="list-group-item list-group-item-success">${product.marca} - ${product.precio}<button class="btn-eliminar btn btn-warning" id='${product.id_producto}'> Eliminar</button><button class="btn-editar btn btn-warning" id='${product.id_producto}'> Editar</button></li>`;
		}


		let allButtonsEditar = document.querySelectorAll(".btn-editar");
	    for(var i=0; i < allButtonsEditar.length; i++){
	      allButtonsEditar[i].addEventListener('click', async function(e) {
	        editar(e);
	      });
	    }

		let btnEliminar = document.querySelectorAll(".btn-eliminar");
		for(var i=0; i < btnEliminar.length; i++){
		      btnEliminar[i].addEventListener('click', async function (e) {
		        deleteProducts(e);
		      });
		    }
		}

		
	}    
*/




/*******************************/
  /***********Editar**************/
  /******************************/
 
/*    async function editar(e){
    	console.log("entra");
      let marca = document.querySelector("#ingresoMarca").value;
      let talle = document.querySelector("#ingresoTalle").value;
      let precio = parseInt(document.querySelector('#ingresoPrecio').value);
     
      if(marca===''){
        document.querySelector(".msjEditar").classList.add("avisoMsjEditar");
        document.getElementById('ingresoMarca').focus();
        setTimeout(limpiar,2000);
      } else {
        let idSeleccionEditar = e.target.id;

       const url = 'https://web-unicen.herokuapp.com/api/groups/MuñozCabrera10/productosVoley'+'/'+idSeleccionEditar;

       let filas = {
          "thing":{
            "marca" : marca,
            "talle" : talle,
            "precio" : precio
          }  
        };

      try {
          div.innerHTML = "Editando..";
          let r = await fetch(url,{
            "method" : "PUT",
            "headers" : {
              "Content-Type" : "application/json"
            },
            "body" : JSON.stringify(filas)
          });
          let json = await r.json();
          div.innerHTML = "Se edito correctamente";
      } catch(e) {
          div.innerHTML = "Se edito mal";
        }
          mostrar();
          setTimeout(limpiarForm,1500);
    }  
  	
}
*/

