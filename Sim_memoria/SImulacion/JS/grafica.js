function dibujarGrafica(lista,espacio_memoria) {
    label=[];
    datas=[];
    var memorias = "Memoria Espacio libre: "+espacio_memoria+" Kb";
    label.push(memorias)
    datas.push(espacio_memoria)
    for (x of lista) {
        var proceso="PR "+x.id_proceso+" Espacio ocupado: "+x.tamano+" Kb";
        var espacio=x.tamano;
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
