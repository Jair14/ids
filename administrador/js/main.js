$(buscar_datos()); // Cuando haya cargado la página, se ejecutará la funcion buscar_datos
function buscar_datos(consulta){ // Función buscar_datos
    $.ajax({ // Se establece una estructura AJAX para la búsqueda en tiempo real
        url: 'buscar.php', // Establecemos la URL  a la que se dirigirá
        type: 'POST', // Se enviará mediante método POST
        dataType: 'html', // El tipo de dato es html
        data: {consulta: consulta}, // Enviamos parametros a la funcion AJAX
    })
    .done(function(respuesta){ // Función que se ejecutará al resultar exitosa la petición asíncrona
        $("#datos").html(respuesta); // Le insertamos la respuesta del servidor al id datos
    })
    .fail(function(){ // Función que se ejecutará al fallar la petición AJAX
        console.log("Error"); // Se manda a consola el error
    })
}
$(document).on('keyup', '#buscar', function(){ // Al presionar una tecla se ejecutará la función
    var valor = $(this).val(); // Se obtiene el valor del id buscar
    if (valor != "") {// Si el valor contiene algo, se ejecutará la funcion buscar_datos con los valores de folio y el valor obtenido
        buscar_datos(valor);
    }else{
        buscar_datos();
    }
})
