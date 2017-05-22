$(document).ready(function(){
    $( function() {
    //autocomplete
    $("#contacto").autocomplete({
        source: ".././modelo/DB_buscarContacto.php",
        minLength: 1
    });  
  } );
});

