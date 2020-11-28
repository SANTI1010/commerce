document.addEventListener('DOMContentLoaded',iniciar);

async function iniciar() {
	"use strict"

	let id_producto = document.getElementById("id_product_hidden").value;
	let id_user = document.getElementById("id_user_hidden").value;
	let rol_user = document.getElementById("rol_user_hidden").value;

	let app = new Vue({
		el:'#vue-comment',
		data : {
			comments : [],
			rol_user:rol_user,
			id_producto:id_producto,
		},
		methods: {
   			deleteComment: deleteComment
  }
	});

	getCommentById(id_producto);

	document.querySelector('#form-comment').addEventListener('submit', e => {
		e.preventDefault();
		insertComment();
	});	

	function deleteComment(id_comentario) {
		fetch('api/comments'+'/'+id_comentario, {
			method: 'DELETE',
			headers : {"Content-Type" : "application/json"},
			body: JSON.stringify()
		})
			.then(response => response.json())
			.then(comments => getCommentById(id_producto))
			.catch(error => console.log(error));
	}


	function getCommentById(id_producto){
		fetch('api/comments'+'/'+id_producto)
			.then(response => response.json())
			.then(comments => app.comments = comments)
			.catch(error => console.log(error));
	}


	function insertComment() {
		const comment = {
			comentario: document.querySelector("#newComment").value,
			puntaje: document.querySelector('input[name=estrellas]:checked').value,
			id_producto : id_producto,
			id_usuario : id_user,
		}

		fetch('api/comments', {
			method: 'POST',
			headers : {"Content-Type" : "application/json"},
			body: JSON.stringify(comment)
		})
			.then(response => response.json())
			.then(comments => app.comments.push(comment))
			.catch(error => console.log(error));
	}

}
