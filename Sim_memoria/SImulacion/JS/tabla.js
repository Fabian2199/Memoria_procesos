function dibujarTabla(lista,id_tabla,tamano_lista) {
    let procesos=[];
    for (let index = 0; index < tamano_lista; index++) {
       var proceso = lista[index];
       procesos.push(proceso)
    }
    let tablaProceso = document.getElementById(id_tabla);
    document.getElementById("cuerpo_tabla").remove();
    let cuerpoTabla = document.createElement('tbody');
    cuerpoTabla.setAttribute("id","cuerpo_tabla")
    procesos.forEach(p => {
        var id = p.id_proceso;
        let fila = document.createElement('tr');
        
        let td = document.createElement('th');
        td.innerText = "PR "+p.id_proceso;
        fila.appendChild(td);

        td = document.createElement('th');
        td.innerText = p.tamano+" Kb";
        fila.appendChild(td);

        td = document.createElement('th');
        td.innerText = p.duracion+" Seg";
        fila.appendChild(td);

        td = document.createElement('th');
        td.innerText = p.prioridad;
        fila.appendChild(td);

        td = document.createElement('th');
        td.innerText = p.estado;
        fila.appendChild(td);

        cuerpoTabla.appendChild(fila);
    });
    tablaProceso.appendChild(cuerpoTabla);
    
}