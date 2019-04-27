let dqs = (el) => { return document.querySelector(el) } // una simple funcion para abreviar document.querySelector 
//lo voy a usar en create control
var createControl = new Vue({
	el: '#createControl', //elemento a trabajar con vue.js
	//modelo de datos de la app
	data: {
		objc: null,
	},
	methods: {
		//obtener todos los contactos de la bd
		getObjcontrol: function(){
      	let dominio_id = dqs('#dominio_id').value
			let url = '/sgsi/ajax/objcontrol/' + dominio_id
			//ejecuto la peticion ajax al controlador
			axios.get(url).then(res => {
				console.log(res.data.objc)
				this.objc = res.data.objc //añado todos los contactos que me devuelve la bd
				$('#objcontrol_id').attr('disabled', false);
				$('#numero_con').attr('disabled',false);
				$('#nombre_con').attr('disabled',false);
			})
		}
	}
})

var createObjControl = new Vue({
	el: '#createObjControl', //elemento a trabajar con vue.js
	//modelo de datos de la app
	data: {
		dominio: null,
	},
	methods: {
		//obtener todos los contactos de la bd
		getDominio: function(){
      	let dominio_id = dqs('#dominio_id').value
			let url = '/sgsi/ajax/dominio/' + dominio_id
			//ejecuto la peticion ajax al controlador
			axios.get(url).then(res => {
				console.log(res.data.objc)
				this.objc = res.data.objc //añado todos los contactos que me devuelve la bd
				$('#objcontrol_id').attr('disabled', false);
				$('#numero_con').attr('disabled',false);
				$('#nombre_con').attr('disabled',false);
			})
		}
	}
})