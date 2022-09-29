function prueba(lista, contador) {
    lista[0].id_proceso = contador;
    //console.log(lista[0].id_proceso)
    return lista;
}
function espacio_libre(ejecutando,tamano_memoria){
    espacio=0;
    for (x of ejecutando) {
        espacio=espacio+parseInt(x.tamano);
    }
    espacio=tamano_memoria-espacio;
    return espacio
}
function actu_lista_memoria(activos,ejecutando,tamano){
    for (x of activos) {
        if (parseInt(x.tamano)<=tamano) {
            x.estado = "Ejecutando";
            ejecutando.push(x);
        }
        
    }
    return ejecutando;
}
function actu_lista_activos(activos,ejecutando) {
    lista_activos= convertirArray(activos);
    lista_ejecutando =convertirArray(ejecutando);
    for (let index = 0; index < lista_ejecutando.length; index++) {
        proceso =lista_ejecutando[index];
        indice = lista_activos.findIndex(elemento => {return elemento.id_proceso === proceso.id_proceso } );
        if (indice>=0) {
            lista_activos.splice(indice,1); 
        }
    }
    activos=convertirJSON(lista_activos);
    return activos;
}
function convertirArray(lista){
    array=[];
    for ( x of lista) {
        array.push(x);
    }
    return array
}
function convertirJSON(lista) {
    lista_json=[];
    for (let index = 0; index < lista.length; index++) {
        objeto = lista[index];
        objetoJSON = JSON.stringify(objeto);
        objetoJSON = JSON.parse(objetoJSON);
        lista_json.push(objeto);
    }
    return lista_json
}
function ejecutarUnProceso(proceso,temp) {
    duracion= proceso.duracion;
    crono = proceso.cronometro;
    crono++
    if (duracion==crono) {
        proceso.duracion =temp;
        proceso.estado = "Terminado";
    }
    proceso.cronometro = crono;
    return proceso;
}
function ejecutarProcesos(ejecutando,temp,terminado,libre,activos,tamano_memoria) {
    ejecutando2 = ejecutando;
    console.log("------------");
    for(x of ejecutando){
       
        console.log("id "+x.id_proceso+" dur "+x.duracion+ " crono "+x.cronometro);
        x = ejecutarUnProceso(x,temp);
        
        if (x.estado=="Terminado") {
            terminado.push(x);
            ejecutando2 = actu_lista_activos(ejecutando,terminado);
            dibujarTablaT(terminado, 'terminados');
            libre= espacio_libre(ejecutando2,tamano_memoria);
            ejecutando2= actu_lista_memoria(activos,ejecutando2,libre);
        }
    }
    ejecutando = ejecutando2;
    activos = actu_lista_activos(activos,ejecutando);
    
    datos = [ejecutando,terminado,libre,activos];
    return datos;
}