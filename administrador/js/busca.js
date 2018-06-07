
function getParameterByName(name) {// Función que nos permitirá obtener valores de la URL
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]"); // Se establece una expresión regular para lograr extraer valores de la URL
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search); // Búscamos en la URL según la expresión regular
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " ")); // Devolvemos los resultados obtenidos
}
var folio = getParameterByName('folio'); // Obtenemos el folio de la URK
var ej = ""; //Establecemos un valor inicial para comenzar la búsqueda
$(buscar_datos(ej, folio)); // Cuando haya cargado la página, se ejecutará la funcion buscar_datos
function buscar_datos(consulta, folio){ // Función buscar_datos
    $.ajax({ // Se establece una estructura AJAX para la búsqueda en tiempo real
        url: 'buscarp.php', // Establecemos la URL  a la que se dirigirá
        type: 'POST', // Se enviará mediante método POST
        dataType: 'html', // El tipo de dato es html
        data: {consulta: consulta, folio: folio}, // Enviamos parametros a la funcion AJAX
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
    if (valor != "") { // Si el valor contiene algo, se ejecutará la funcion buscar_datos con los valores de folio y el valor obtenido
        buscar_datos(valor, folio);
    }else{
        buscar_datos(valor, folio);
    }
})
