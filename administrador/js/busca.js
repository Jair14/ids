function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
var folio = getParameterByName('folio');
var ej = "a";
$(buscar_datos(ej, folio));
function buscar_datos(consulta, folio){
    $.ajax({
        url: 'buscarp.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta, folio: folio},
    })
    .done(function(respuesta){
        
        $("#datos").html(respuesta);
    })
    .fail(function(){
        console.log("Error");
    })
}
$(document).on('keyup', '#buscar', function(){
    var valor = $(this).val();
    if (valor != "") {
        buscar_datos(valor, folio);
    }else{
        buscar_datos(valor, folio);
    }
})