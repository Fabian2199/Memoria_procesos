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
for ($i = 1; $i < count($procesos_ejecutando); $i++) {
    $indice = array_search($procesos_ejecutando[2], $procesos_activos);
    unset($procesos_activos[$indice]);
}
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

                        <table>
                            <thead>
                                <th>Id_proceso</th>
                                <th>Espacio en memoria</th>
                                <th>Tiempo de ejecucion</th>
                                <th>Prioridad</th>
                                <th>Estado</th>
                            </thead>
                            <tbody>
                                <?php foreach ($procesos_activos as $proceso) { ?>
                                    <tr>
                                        <th>PR <?php echo $proceso->getId(); ?> </th>
                                        <th><?php echo $proceso->getTamaño(); ?> Kb</th>
                                        <th><?php echo $proceso->getDuracion(); ?> Seg</th>
                                        <th><?php echo $proceso->getPrioridad(); ?> </th>
                                        <th><?php echo $proceso->getEstado(); ?> </th>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div for="tar" class="procesos_lista">
                <div class="proceso" id="tar">
                    <div class="adelante">
                        <h1>Procesos en memoria</h1>
                        <input type="text" id="contador">
                        <table>
                            <thead>
                                <th>Id proceso</th>
                                <th>Espacio en memoria</th>
                                <th>Tiempo de ejecucion</th>
                                <th>Estado</th>
                            </thead>
                            <tbody>
                                <?php for ($i = 1; $i < count($procesos_ejecutando); $i++) { ?>
                                    <tr>
                                        <th>PR <?php echo $procesos_ejecutando[$i]->getId(); ?> </th>
                                        <th><?php echo $procesos_ejecutando[$i]->getTamaño(); ?> Kb</th>
                                        <th><?php echo $procesos_ejecutando[$i]->getCronometro(); ?> Seg</th>
                                        <th><?php echo $procesos_ejecutando[$i]->getEstado(); ?> </th>
                                    </tr>

                                <?php } ?>
                                <?php
                                $tam = ejeUnProceso($procesos_ejecutando[1], 10, $memoria, 10);
                                ?>
                            </tbody>
                        </table>
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
                                <th>Id_proceso</th>
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
$tamaño_libre_memoria= $procesos_ejecutando[0];
unset($procesos_ejecutando[0]);
$tamañó_lista= count($procesos_ejecutando);
$lista = json_encode($procesos_ejecutando)
?>
<script src="../JS//helpers.js"></script>
<Script src="../JS/grafica.js"></Script>
<script>
    var lista=<?php echo $lista?>;
    var tamano =<?php echo $tamañó_lista?>;
    var libre = <?php echo $tamaño_libre_memoria?>;
    //alert(lista[1].duracion)
    alert(tamano)
    dibujarGrafica(lista,tamano,libre);</script>
</html>