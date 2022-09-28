function dibujarGrafica(lista,tamano,espacio_memoria) {
    label=[];
    datas=[];
    var memorias = "Memoria Espacio libre: "+espacio_memoria+" Kb";
    label.push(memorias)
    datas.push(espacio_memoria)
    for (let index = 1; index <= tamano; index++) {
        var proceso="PR "+lista[index].id_proceso+" Espacio ocupado: "+lista[index].tamano+" Kb";
        var espacio=lista[index].tamano;
        label.push(proceso)
        datas.push(espacio)
    }

    Chart.defaults.color = '#282625'
    Chart.defaults.borderColor = '#444'
    const printCharts = () =>{
    
        renderModelsChart()
    }
    
    const renderModelsChart = () =>{
    
        const data ={
            labels:label,
            datasets:[{
                data:datas,
                borderColor: getDataColors(),
                backgroundColor: getDataColors(15)
            }]
        }
        if (window.grafica) {
            window.grafica.clear();
            window.grafica.destroy();
        }
        window.grafica = new Chart('modelsChart', { type: 'doughnut', data })
    }
    
    printCharts()
}
