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





