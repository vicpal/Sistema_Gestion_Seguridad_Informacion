let dqs = (el) => { return document.querySelector(el) } // una simple funcion para abreviar document.querySelector 
//lo voy a usar en create control
var createControl = new Vue({
	el: '#createControl', //elemento a trabajar con vue.js
	//modelo de datos de la app
	data: {
		objc: null,
	},
	methods: {
		//obtener todos los registros de la bd
		getObjcontrol: function(){
      	let dominio_id = dqs('#dominio_id').value
			let url = '/sgsi/ajax/objcontrol/' + dominio_id
			//ejecuto la peticion ajax al controlador
			axios.get(url).then(res => {
				console.log(res.data.objc)
				this.objc = res.data.objc //añado todos los registros que me devuelve la bd
				$('#objcontrol_id').attr('disabled', false);
				//$('#numero_con').attr('disabled',false);
				$('#nombre_con').attr('disabled',false);
			})
		}
	}
})

var createPregunta = new Vue({
	el: '#createPregunta', //elemento a trabajar con vue.js
	//modelo de datos de la app
	data: {
		contr: null,
	},
	methods: {
		//obtener todos los registros de la bd
		getControl: function(){
      	let objcontrol_id = dqs('#objcontrol_id').value
			let url = '/sgsi/ajax/control/' + objcontrol_id
			//ejecuto la peticion ajax al controlador
			axios.get(url).then(res => {
				console.log(res.data.contr)
				this.contr = res.data.contr//añado todos los registros que me devuelve la bd
				$('#objcontrol_id').attr('disabled', false);
				$('#control_id').attr('disabled',false);
				$('#nombre_preg').attr('disabled',false);
			})
		}
	}
})