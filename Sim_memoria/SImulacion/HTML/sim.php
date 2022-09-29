<?php
include("../PHP/datos.php");
include("../PHP/listasMemoria.php");
$memoria = $_GET['id_memoria'];
$datosMemoria = getDatosMemoria($memoria);
$tamaño;
while ($row = $datosMemoria->fetch_assoc()) {
    $tamaño = $row['tamaño'];
}
$procesos = getProceso();
$procesos_activos = procesosActivos($procesos);
$procesos_ejecutando = simMemoria($tamaño, $procesos_activos);
$proceos_finalizados = getProcesosTerm();
//$procesos_activos= actualizarActivos($procesos_activos,$procesos_ejecutando);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Simulacion</title>
    <link rel="stylesheet" type="text/css" href="../iconos/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../CSS/banner.css">
    <link rel="stylesheet" type="text/css" href="../CSS/menu.css">
    <link rel="stylesheet" type="text/css" href="../CSS/body.css">
    <link rel="stylesheet" type="text/css" href="../CSS/principal.css">
    <link rel="stylesheet" type="text/css" href="../CSS/tablas.css">
    <link rel="stylesheet" type="text/css" href="../CSS/popup.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
</head>

<body>

    <header>
        <div class="contenedor">
            <img src="../img_gen/logoBFree.png" class="logogym">
        </div>
    </header>
    <main>
        <div class="principal" id="principal">
            <div for="tar" class="procesos_lista">
                <div class="proceso" id="tar">
                    <div class="adelante">
                        <h1>Lista de procesos activos</h1>

                        <table id="activos">
                            <thead>
                                <th>Id_proceso</th>
                                <th>Espacio en memoria</th>
                                <th>Tiempo de ejecucion</th>
                                <th>Prioridad</th>
                                <th>Estado</th>
                            </thead>
                            <tbody id="cuerpo_tabla"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div for="tar" class="procesos_lista">
                <div class="proceso" id="tar">
                    <div class="adelante">
                        <h1>Procesos en memoria</h1>
                        <input type="text" id="contador">
                        <canvas id="modelsChart"></canvas>
                    </div>
                </div>
            </div>
            <div for="tar" class="procesos_lista">
                <div class="proceso" id="tar">
                    <div class="adelante">
                        <h1>Procesos terminados</h1>
                        <table id="terminados">
                            <thead>
                                <th>Id proceso</th>
                                <th>Espacio en memoria</th>
                                <th>Tiempo de ejecucion</th>
                                <th>Prioridad</th>
                                <th>Estado</th>
                            </thead>
                            <tbody id="cuerpo_tabla_ter"> </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="../JS/contador.js"></script>
<?php
//datos lista de procesos ejecutando
$lista = json_encode($procesos_ejecutando);
//datos lista de procesos activos
$lista_activos = json_encode($procesos_activos);

?>
<script src="../JS//helpers.js"></script>
<Script src="../JS/grafica.js"></Script>
<Script src="../JS/tabla.js"></Script>
<Script src="../JS/tablaT.js"></Script>
<Script src="../JS/funciones_simulador.js"></Script>
<script>
    //tamañó memoria
    tamano_memoria=<?php echo $tamaño ?>;
    //------------------------------------
    var iterador=0;
    var lista_activos = <?php echo $lista_activos ?>;//1
    
    var lista_ejecutando = <?php echo $lista ?>;//2
    lista_activos = actu_lista_activos(lista_activos,lista_ejecutando);
    lista_terminados=[];
    var libre = espacio_libre(lista_ejecutando,tamano_memoria);//3
    function ejecucion() {
        iterador++;
        listas_datos =ejecutarProcesos(lista_ejecutando,iterador,lista_terminados,libre,lista_activos,tamano_memoria);
        lista_ejecutando = listas_datos[0];//4
        lista_terminados = listas_datos[1];//5 
        libre = listas_datos[2];
        lista_activos=listas_datos[3];
        dibujarTabla(lista_activos, 'activos');
        dibujarGrafica(lista_ejecutando, libre);
        console.log(iterador);
    }
    setInterval('ejecucion()',2000);
    dibujarTabla(lista_activos, 'activos');
    dibujarGrafica(lista_ejecutando, libre);

</script>

</html>