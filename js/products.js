"use strict"

document.addEventListener('DOMContentLoaded', () => {
	getProducts();

	document.querySelector('#form-product').addEventListener('submit', e => {
		e.preventDefault();

		addProducts();		
	});
});

function getProducts(){
	fetch('api/products')
		.then(response => response.json())
		.then(productos =>render(productos))
		.catch(error => console.log(error)); 
}


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
		.then(product => getProducts())
		.catch(error => console.log(error));
}


function render(products) {
	const container = document.querySelector('#product-list');

	container.innerHTML = "";

	for(let product of products) {
		container.innerHTML += `<li data-id-product="${product.id_producto}" class="list-group-item list-group-item-success">${product.marca} - ${product.precio}</li>`;
	}
}

