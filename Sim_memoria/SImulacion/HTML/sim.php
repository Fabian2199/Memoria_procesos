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
                        <table>
                            <thead>
                                <th>Id proceso</th>
                                <th>Espacio en memoria</th>
                                <th>Tiempo de ejecucion</th>
                                <th>Estado</th>
                            </thead>
                            <tbody>
                                <?php while ($row = $proceos_finalizados->fetch_assoc()) { ?>
                                    <tr>
                                        <th><?php echo $row['id_proceso']; ?> </th>
                                        <th><?php echo $row['tamaño']; ?> Kb</th>
                                        <th><?php echo $row['duracion']; ?> ms</th>
                                        <th><?php echo $row['estado']; ?></th>
                                    </tr>
                                <?php } ?>
                            </tbody>
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
$tamaño_libre_memoria = $procesos_ejecutando[0];
unset($procesos_ejecutando[0]);
$tamañó_lista = count($procesos_ejecutando);
$lista = json_encode($procesos_ejecutando)
?>
<?php
//datos lista de procesos activos
$tamañó_lista_activos = count($procesos_activos);
$lista_activos = json_encode($procesos_activos)
?>
<script src="../JS//helpers.js"></script>
<Script src="../JS/grafica.js"></Script>
<Script src="../JS/tabla.js"></Script>
<Script src="../JS/funciones_simulador.js"></Script>
<script>
    var iterador=0;
    function ejecucion() {
        iterador++;
        var datos = [];
        //datos procesos ejecutando
        var lista_ejecutando = <?php echo $lista ?>;
        var tamano_lista_ejecutando = <?php echo $tamañó_lista ?>;
        var libre = <?php echo $tamaño_libre_memoria ?>;
        //datos procesos activos
        lista_activos = <?php echo $lista_activos ?>;
        lista_activos = prueba(lista_activos,iterador);
        var tamano_lista_activos = <?php echo $tamañó_lista_activos ?>;
        datos.push(lista_ejecutando, tamano_lista_ejecutando, libre, lista_activos, tamano_lista_activos);
        dibujarTabla(lista_activos, 'activos', tamano_lista_activos);
        dibujarGrafica(lista_ejecutando, tamano_lista_ejecutando, libre);
        return datos;
    }
    setInterval('ejecucion()', 5000);
    var datos = ejecucion();
    //datos procesos ejecutando
    var lista_ejecutando = datos[0];
    var tamano_lista_ejecutando = datos[1];
    var libre = datos[1];
    setInterval(console.log(iterador), 5000);
    //dibujarGrafica(lista_ejecutando, tamano_lista_ejecutando, libre);

</script>

</html>