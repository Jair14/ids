folios_preguntas = [];
usados = [];
usados2 = [];
folios_para_usar = [];
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
//Con esta funcion generaremos lo folios aleatorios por materia
function obtener_folios(rango, numero_preguntas) {
    for (var i = 0; i < numero_preguntas; i++) {
        //El regiustro entra directo a los folios finales de preguntas a realizar
        folios_preguntas.push(aleatorio(rango[0], rango[rango.length-1]));
        console.log(folios_preguntas);
    }
}
function separar_folios(folios){
    //La intencion de la funcion es separar en grupos de folios los folios ya recibidos
    //Comenzamos inicializando un array vacio el cual nos servirá de auxiliar para ir llenando un arreglo mas grande
    x = []
    //Contaremos los caracteres de un folio para saber que posición debe comparar
    if (folios[1].length == 7) {
        num = 4;
    }
    else if (folios[1].length == 8) {
        num = 5;
    }
    else {
        num = 6
    }
    //El primer ciclo irá avanzando dependiendo el tamaño de los folios que recibieron
    for (var i = 0; i < folios.length; i++) {
        //Primero para asegurar que no sea el ultimo elemento del array
        if(folios[i] == folios[folios.length-1]){
            //En caso de serlo se añadirá al elemento de array que ya esta desarrollado
            x.push(parseInt(folios[i]));;
            //Una vez agregado tambien se añadirá al arreglo final
            folios_para_usar.push(x)
        }
        else {
            //En caso contrario se checa que los folios sean iguales, pertenezcan a la misma base todos en 1000 o 2000 etc
            if (folios[i][num] == folios[i+1][num]) {
                    //En caso de serlo se agrega el numero a nuestro arreglo auxiliar convirtiendolo a entero
                    x.push(parseInt(folios[i]));
            }
            else{
                //Y si no son iguales significa que es el ultimo elemento de nuestro grupo de folios
                //Por lo que hay que cerrar nuestro array auxiliar y añadir todos los elementos a el array de folios finales
                x.push(parseInt(folios[i]));
                folios_para_usar.push(x);
                //Reiniciamos el array auxiliar
                x = [];
            }
        }
    }
}
//Hemos mandado por url el numero de folios totales que tiene el arreglo de folios de preguntas
num_folios = getParameterByName('num_folios');
//Obtenemos el array de folios de modo STRING
folios_disponibles = getParameterByName('folios_preguntas');
console.log(folios_disponibles);
//Separamos lo folios del string y los volvemos un mismo arreglo
folios_disponibles_final = folios_disponibles.split(",", num_folios);
console.log(folios_disponibles_final);
//Pasamos a la funcion los elemento de los folios que recibimos de URL
separar_folios(folios_disponibles_final);
//Solo para asegurarnos que todo haya salido correcto
//console.log(folios_para_usar);
    //Aqui comienza algo un tanto abstracto de esto
    //Inicializamos un diccionario, la intencion es que guarde los nombres(name) que existen
    //los guardara con un valor "sin contestar"
    //Este nos permitira saber que una vez contestados no aumente el contador de las preguntas que ya han sido resultas
    dic_respuestas = {};
    //Para saber el numero de preguntas de cada seccion
    dic_seccion = {}
//Una vez qu el documento haya cargado lo básico procederá con lo siguiente:
$(document).ready(function(){
    //Indicamos el folio del alumno
    folio_use = getParameterByName('folio');
    //Cantidad de elementos que tiene el arreglo de materias-no.preguntas
    elementos = getParameterByName('ele');
    //Se obtiene un string con toda la info de materias-no.preguntas
    materias = getParameterByName('info');
    //Se crea el arreglo separando por "," y en un maximo de elementos
    para_usar = materias.split(",", elementos);
    //Añadiremos cada folio con un ciclo el cual mandará el numero de preguntas por materia
    // y mandara el rango de folios
    //Nos llevara un contador muy necesario
    k = 0
    for (var i = 0; i < para_usar.length; i+=2) {
        dic_seccion[para_usar[i].replace(/[^a-zA-Z 0-9.]+/g,'')] = para_usar[i+1];
        obtener_folios(folios_para_usar[k], para_usar[i+1]);
        k += 1;
    }
    //Añadimos un input oculto para tener el folio donde se van a guardar
    $("form").append('<div class="input-field hide"><input type="text" name="folio" value="'+folio_use+'"></div>');
    console.log(folios_preguntas);
    //Funcion en JQuery que manda a llamar un archivo php, le pasamos variables desde las sentencias {}
    $.get("pruebas.php", {folios: folios_preguntas},function(data){
        //Si llega a haber errores se mostrara un mensaje
        if(data.error){
            window.alert(data.mensaje);
        }
        else {
            con_preguntas = 0;
            //Comenzaremos un ciclo que se repetira el mismo numero de veces que las materias que haya
            for (var i = 0; i < para_usar.length; i+=2) {
                //tambien por fuera iniciamos un contador que va a llevar todas las preguntas
                //Comenzamos creando el elemnto de las tab principal, el replace se usa para quitar los caracteres especiales de los nombres
                $("#nav").append('<li class="tab col s3"><a class="black-text" href="#'+(para_usar[i].replace(/[^a-zA-Z 0-9.]+/g,''))+'" id="'+para_usar[i].replace(/[^a-zA-Z 0-9.]+/g,'')+'_id" onclick=helpo(this)>'+para_usar[i]+'</a></li>');
                $('ul.tabs').tabs();
                //Dentro de los card también añadiremos los nuevos tabs dependiendo la pregunta y la seccion
                //tambien dentro de esta se creará la lista con las preguntas de cada sección
                $("#contenido").append('<div id="'+(para_usar[i].replace(/[^a-zA-Z 0-9.]+/g,''))+'" class="col s12"><div class="row"><div class="col s12"><ul class="tabs tabs-fixed-width" id="'+(para_usar[i].replace(/[^a-zA-Z 0-9.]+/g,''))+'-tab"></ul></div></div></div>');
                //Un ciclo que represente el numero de preguntas que hay por materia
                for (var k = 0; k < parseInt(para_usar[i+1]); k++) {
                    //Dependiendo el numero de preguntas se irá agregando el elemento a la barra tab
                    //Se les añadira un id con el name de la respuesta a la que corresponden para hacer mas facil el coloreo
                    //Dejamos activa la primera
                    if(con_preguntas == 0){
                        $("#"+(para_usar[i].replace(/[^a-zA-Z 0-9.]+/g,''))+"-tab").append('<li class="tab col s3" ><a class="black-text help help2" href="#'+(para_usar[i].replace(/[^a-zA-Z 0-9.]+/g,''))+k+'" onclick=cambio(this)>Pregunta '+(con_preguntas+1)+'</a></li>');
                    }
                    else{
                        $("#"+(para_usar[i].replace(/[^a-zA-Z 0-9.]+/g,''))+"-tab").append('<li class="tab col s3" ><a class="black-text" href="#'+(para_usar[i].replace(/[^a-zA-Z 0-9.]+/g,''))+k+'" onclick=cambio(this)>Pregunta '+(con_preguntas+1)+'</a></li>');
                    }
                    $('ul.tabs').tabs();
                    //Creamos el div correspondiente a cada pregunta
                    $("#"+(para_usar[i].replace(/[^a-zA-Z 0-9.]+/g,''))).append('<div id="'+(para_usar[i].replace(/[^a-zA-Z 0-9.]+/g,''))+k+'"></div>');
                    //Añadimos el contenido al div
                    $('ul.tabs').tabs();
                    //Generamos primero un aleatorio para el acomodo de las respuestas
                    opc = [];
                    for (var a = 0; a < 4; a++) {
                        opc.push(aleatorio2(0, 3));
                    }
                    //Es la unica manera con la que funciono el evento de cambio en radio button
                    //Se pasa como parametro el this para que mande toda la información del input seleccionado
                    evento = "onchange=myfunction(this)";
                    //Por fines practicos se crearán primero variables con el contenido de cada respuesta
                    respuesta1 = '<div class="other-top"><p><input class="with-gap" name="respuestas['+con_preguntas+'][2]" type="radio" id="respuestas['+con_preguntas+'][2]_a" value="'+data[con_preguntas][opc[0]]+'_a" '+evento+' required/><label for="respuestas['+con_preguntas+'][2]_a">a) '+data[con_preguntas][opc[0]]+'</label></p><br>'
                    respuesta2 = '<p><input class="with-gap" name="respuestas['+con_preguntas+'][2]" type="radio" id="respuestas['+con_preguntas+'][2]_b" value="'+data[con_preguntas][opc[1]]+'_b" '+evento+' required/><label for="respuestas['+con_preguntas+'][2]_b">b) '+data[con_preguntas][opc[1]]+'</label></p><br>'
                    respuesta3 = '<p><input class="with-gap" name="respuestas['+con_preguntas+'][2]" type="radio" id="respuestas['+con_preguntas+'][2]_c" value="'+data[con_preguntas][opc[2]]+'_c" '+evento+' required/><label for="respuestas['+con_preguntas+'][2]_c">c) '+data[con_preguntas][opc[2]]+'</label></p><br>'
                    respuesta4 = '<p><input class="with-gap" name="respuestas['+con_preguntas+'][2]" type="radio" id="respuestas['+con_preguntas+'][2]_d" value="'+data[con_preguntas][opc[1]]+'_d" '+evento+' required/><label for="respuestas['+con_preguntas+'][2]_d">d) '+data[con_preguntas][opc[3]]+'</label></p><br></div>'
                    //Se añade la preguta al contenido con todo y sus posibles respuestas
                    $("#"+(para_usar[i].replace(/[^a-zA-Z 0-9.]+/g,''))+k).append('<div class="input-field hide"><input type="text" name="respuestas['+con_preguntas+'][1]" value="'+data[con_preguntas].id_pregunta+'"></div><p>'+data[con_preguntas].pregunta+'</p>'+respuesta1+respuesta2+respuesta3+respuesta4);
                    //Si tienen contenido de imagen
                    if(data[con_preguntas].imagen){
                        $("#"+(para_usar[i].replace(/[^a-zA-Z 0-9.]+/g,''))+k).prepend('<div class="col s12"><img src="'+data[con_preguntas].imagen+'" class="responsive-img"></div>')
                    }
                    //Se añade el nombre(name) de las preguntas con un valor "sin contestar" en un diccionario
                    dic_respuestas['respuestas['+con_preguntas+'][2]'] = "sin contestar";
                    //Se aumenta el conteo de las preguntas
                    con_preguntas += 1;
                }
            }
        }
    }, "json");
    manu();
    $('ul.tabs').tabs();
});
//Contador para saber cunado enviar las respuestas
respuestas_totales = 0
//esta es la funcion con cada que se de click en un radio button se agregara uno al contador si ya ha sido todo resuelto aparecera el boton de enviar
//el parametro contará con la informacion de input que se selccionó
function myfunction(elemento_seleccionado){
    //Se checa que la pregunta no haya sido contestada aún
    if (dic_respuestas[$(elemento_seleccionado).attr("name")] == "sin contestar" ) {
        //Si no ha sido contestada se agrega uno al contador de elementos contestados
        respuestas_totales += 1
        //Busca el enlace, que este activo, el help solo es para identificar cual es de preguntas
        $("a.active.help").addClass("green");
        //Si ya se contestó todo se mostrará el botón de enviar
        if (respuestas_totales == con_preguntas) {
            $(".card-action").removeClass("hide");
        }
        //Se cambiará en el diccionario el valor de contestado
        //de esta forma ya no se añadiran elementos al conteo si ya han sido respondidos
        dic_respuestas[$(elemento_seleccionado).attr("name")] = "contestado"
        //Para cada seccion
        dic_seccion[$(elemento_seleccionado).parent().parent().parent().attr("id").replace(/.$/, '')] -= 1;
        if(dic_seccion[$(elemento_seleccionado).parent().parent().parent().attr("id").replace(/.$/, '')] == 0){
            $("#"+$(elemento_seleccionado).parent().parent().parent().attr("id").replace(/.$/, '')+"_id").addClass('green');
        }
    }
    //Busca el enlace, que este activo, el help solo es para identificar cual es de preguntas
    $("a.active.help").addClass("green");
}
//Se le añade el help para que funcione el coloreado
function cambio(tab_sele){
    $(tab_sele).addClass("help");
}
//Ayuda para que se coloreen las respuestas de los primeros elementos de cada sección
function helpo(esto) {
    id = $(esto).attr("href");
    console.log(id);
    $('a[href="'+id+'0"]').addClass("help");
}
function manu() {
    swal({
        title: 'INSTRUCCIONES:',
        background: 'url(http://goo.gl/jVlMUC)',
        html: '<ol>'+
        '<li><strong>Para poder ver una pregunta o sección determinada, deberá dar click en el espacio superior que lo señala.</li>'+
        '<li>Deberá leer atentamente cada una de las preguntas y seleccionar la respuesta que considere correcta. Cada que conteste una pregunta, el espacio superior que marca el número de pregunta, se coloreara.</li>'+
        '<li>Debe contestar todas las preguntas de cada sección, una vez contestadas, se coloreara el espacio superior que señala la sección.</li>'+
        '<li>Una vez contestado todo el examen, se activará un botón para enviar sus respuestas.</li>'+
        '</ol>'+
        '<h5>OBSERVACIONES:</h5>'+
        '<ul>'+
        '<li>No debe reiniciar la página, pues esta acción borrará todos sus avances.</li>'+
        '<li>Puedes acceder a este instructivo desde el botón <italic>Instructivo</italic> ubicado en la parte inferior izquierda de tu examen.</strong></li>'+
        '</ul>'
    });
}
$("#manual").click(function(){
    manu();
});
