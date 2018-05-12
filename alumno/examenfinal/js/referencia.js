folios_preguntas = [[1001, 1002, 1003, 1004, 1005], [2001, 2002, 2003, 2004, 2005], [3001, 3002, 3003, 3004, 3005], [4001, 4002, 4003, 4004, 4005], [5001, 5002, 5003, 5004, 5005]];
usados = [];
usados2 = [];
folios_para_usar = [];
id_general = ["espanol_exa", "mate_exa", "ciencias_exa", "historia_exa", "geografia_exa"];
id_especifico = [];
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
var folio_use;
function aleatorio(min, max){
    while(repe != false){
        var num = Math.floor(Math.random()*(max-min+1))+min;
        var repe = repetido(num);
    }
    usados.push(num);
    return num;
}
var conteo = 0;
function aleatorio2(min, max){
    while(repe2 != false){
        var num2 = Math.floor((Math.random()*(max-min+1))+min);
        var repe2 = repetido2(num2);
    }
    usados2.push(num2);
    conteo += 1;
    if (conteo == 4) {
        usados2.splice(0, 4);
        conteo = 0;
    }
    return num2;
}
function repetido(num){
    var repe = false;
    for (var i = 0; i< usados.length; i++){
        if(num == usados[i]){
            repe = true
        }
    }
    return repe;
}
function repetido2(num2){
    var repe2 = false;
    for (var i = 0; i< usados2.length; i++){
        if(num2 == usados2[i]){
            repe2 = true;
        }
    }
    return repe2;
}
function obtener_folios() {
    for (var i = 0; i < folios_preguntas.length; i++) {
        for (var k = 0; k < 3; k++) {
            folios_para_usar.push(aleatorio(folios_preguntas[i][0], folios_preguntas[i][4]));
            //console.log(folios_para_usar.toString());
        }
    }
}
z = 0;
$(document).ready(function(){
    $(".button-collapse").sideNav();
    obtener_folios();
    folio_use = getParameterByName('folio');
    $("#espanol_exa").append('<div class="input-field hide"><input type="text" name="folio" value="'+folio_use+'"></div>');
    $.get("pruebas.php", {folios: folios_para_usar},function(data){
        if(data.error){
            window.alert(data.mensaje);
        }
        for (var i = 0; i < id_general.length; i++) {
            for (var k = 0; k < 3; k++){
                opc = [];
                for (var a = 0; a < 4; a++) {
                    opc.push(aleatorio2(4, 7));
                }
                var respuesta1 = '<div class="tab espacio-arriba"><p><input class="with-gap" name="'+id_general[i]+k+'" type="radio" id="respuesta_'+id_general[i]+(k+1)+z+'_a" value="'+data[z][opc[0]]+'_a" required/><label for="respuesta_'+id_general[i]+(k+1)+z+'_a">a) '+data[z][opc[0]]+'</label></p><br>';
                var respuesta3 = '<p><input class="with-gap" name="'+id_general[i]+k+'" type="radio" id="respuesta_'+id_general[i]+(k+1)+z+'_c" value="'+data[z][opc[2]]+'_c" /><label for="respuesta_'+id_general[i]+(k+1)+z+'_c">c) '+data[z][opc[2]]+'</label></p><br>';
                var respuesta2 = '<p><input class="with-gap" name="'+id_general[i]+k+'" type="radio" id="respuesta_'+id_general[i]+(k+1)+z+'_b" value="'+data[z][opc[1]]+'_b" /><label for="respuesta_'+id_general[i]+(k+1)+z+'_b">b) '+data[z][opc[1]]+'</label></p><br>';
                var respuesta4 = '<p><input class="with-gap" name="'+id_general[i]+k+'" type="radio" id="respuesta_'+id_general[i]+(k+1)+z+'_d" value="'+data[z][opc[3]]+'_d" /><label for="respuesta_'+id_general[i]+(k+1)+z+'_d">d) '+data[z][opc[3]]+'</label></p></div>';
                $("#"+id_general[i]).append('<div class="espacio-arriba" id="test'+i+'-swipe-'+(k+1)+'"><div class="input-field hide"><input type="text" name="folio_pregunta_'+z+'" value="'+data[z][0]+'"></div><p>Pregunta '+(z+1)+': '+data[z][3]+'</p>'+respuesta1+respuesta2+respuesta3+respuesta4+'</div>');
                $('ul.tabs').tabs();
                z+=1;
            }
        }
        $("#mate_exa").hide();
        $("#ciencias_exa").hide();
        $("#historia_exa").hide();
        $("#geografia_exa").hide();
        $("#espanol_exa").show();
        $("#titulo").text("Materia: Español");
    }, "json" );
});
$("#espanol").click(function(){
    $("#titulo").text("Materia: Español");
    $("#mate_exa").hide();
    $("#ciencias_exa").hide();
    $("#historia_exa").hide();
    $("#geografia_exa").hide();
    $("#espanol_exa").show();
});
$("#mate").click(function(){
    $("#titulo").text("Materia: Matemáticas");
    $("#espanol_exa").hide();
    $("#ciencias_exa").hide();
    $("#historia_exa").hide();
    $("#geografia_exa").hide();
    $("#mate_exa").show();
});
$("#ciencias").click(function(){
    $("#titulo").text("Materia: Ciencias");
    $("#espanol_exa").hide();
    $("#mate_exa").hide();
    $("#historia_exa").hide();
    $("#geografia_exa").hide();
    $("#ciencias_exa").show();
});
$("#historia").click(function(){
    $("#titulo").text("Materia: Historia");
    $("#espanol_exa").hide();
    $("#mate_exa").hide();
    $("#ciencias_exa").hide();
    $("#geografia_exa").hide();
    $("#historia_exa").show();
});
$("#geografia").click(function(){
    $("#titulo").text("Materia: Geografía");
    $("#espanol_exa").hide();
    $("#mate_exa").hide();
    $("#ciencias_exa").hide();
    $("#historia_exa").hide();
    $("#geografia_exa").show();
});
