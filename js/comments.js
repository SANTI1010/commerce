document.addEventListener('DOMContentLoaded',iniciar);

async function iniciar() {
	"use strict"

	let id = document.getElementById("id_hidden").value;

	let app = new Vue({
		el:'#vue-comment',
		data : {
			comments : [] 
		}
	});

	getCommentById(id);

	document.querySelector('.editComment').addEventListener('click', e => {
		e.preventDefault();

		let comment = document.querySelector("#newComment").value;

		let puntaje = document.querySelector('input[name=estrellas]:checked').value;

		//let puntaje = document.getElementsByName("estrellas").value;
		console.log(puntaje);
	});



function getCommentById(id){
	fetch('api/comments'+'/'+id)
		.then(response => response.json())
		.then(comments => app.comments = comments)
		.catch(error => console.log(error));
}



	//Inserto productos
	function addComments(e) {

		console.log(e);
		/*const product = {
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
			.then(product => getProducts())
			.catch(error => console.log(error));*/
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

}
