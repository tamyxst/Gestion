$(document).ready(function(){
    $(this).scroll(function(){
            if ($(this).scrollTop() > 80) {
                $('.scrollarriba').fadeIn();
            } else {
                $('.scrollarriba').fadeOut();
            }
        });
        $('.scrollarriba').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 500);
            return false;
        });
    //Valido formulario
    validarFormuContacto();
    /*DataTables*/
    $('#tabmen').DataTable( {
	"pageLength": 5,
	"oLanguage": {
         	"sEmptyTable": "No hay datos disponibles",
		"sInfoEmpty": "No hay datos",
		"sInfo": "Total: _TOTAL_ entradas (_START_ de _END_)",
      		"oPaginate": {
			"sNext": "Siguiente",
			"sPrevious": "Anterior"
      			}
    	},
	"lengthChange": false,
	"sSearch": "Filter"
    });
	var table = $('#tabmen').DataTable();
	$('#buscador').on( 'keyup', function () {
	    table.search( this.value ).draw();
	});
});

function marcar_desmarcar(){
var marca = document.getElementById('marcar');
var cb = document.getElementsByName('checkmsj[]');
for (i=0; i<cb.length; i++){
	if(marca.checked == true){
		cb[i].checked = true
	}else{
		cb[i].checked = false;
	}
	}
}


/*Página contacto*/
function validarFormuContacto(){	
   $("#formn").validate({
     rules: { 
        dni: "required",
        nombre : "required",
	direccion : "required",
	ciudad: "required",
        cod_postal:{
            required: true,
            number:true
        },
	email:{
	    required: true	
        },
	telefono : "required",
    },
    messages: { 
	dni: "El campo dni/cif es obligatorio",
	nombre: "El campo nombre completo es obligatorio",
	direccion: "El campo dirección es obligatorio",
        ciudad: "El campo ciudad es obligatorio",
	cod_postal: "El campo código postal es obligatorio",
        email: "El campo es obligatorio",
        telefono: "El campo teléfono es obligatorio"
	},
    errorLabelContainer: "#errores",
    wrapper: "li",
    invalidHandler: function(event, validator) {
    // 'this' refers to the form
    var errors = validator.numberOfInvalids();
    if (errors) {
        $(".errores_formu").css('display','block');
    }
    }
   })
}
function ocultarFormError(){
    $(".errores_formu").css('display','none');
}



