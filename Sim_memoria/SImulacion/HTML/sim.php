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
$proceos_finalizados = getProcesosTerm();

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
    <script language="javascript" src="..\..\js\jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < count($procesos_activos); $i++) { ?>
                                    <tr>
                                        <th>PR <?php echo $procesos_activos[$i]->getId(); ?> </th>
                                        <th><?php echo $procesos_activos[$i]->getTamaño(); ?> Kb</th>
                                        <th><?php echo $procesos_activos[$i]->getDuracion(); ?> Seg</th>
                                        <th><?php echo $procesos_activos[$i]->getPrioridad(); ?> </th>
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
                        <table>
                            <thead>
                                <th>Id_proceso</th>
                                <th>Espacio en memoria</th>
                                <th>Tiempo de ejecucion</th>
                            </thead>
                            <tbody>
                                <?php $procesos_terminados; ?>
                                <?php for ($i = 0; $i < count($procesos_activos); $i++) { ?>
                                    <tr>
                                        <th>PR <?php echo $procesos_activos[$i]->getId(); ?> </th>
                                        <th><?php echo $procesos_activos[$i]->getTamaño(); ?> Kb</th>
                                        <th><?php echo $procesos_activos[$i]->getDuracion(); ?> Seg</th>
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
                        <h1>Procesos terminados</h1>
                        <table>
                            <thead>
                                <th>Id_proceso</th>
                                <th>Espacio en memoria</th>
                                <th>Tiempo de ejecucion</th>
                            </thead>
                            <tbody>
                                <?php while ($row = $proceos_finalizados->fetch_assoc()) { ?>
                                    <tr>
                                        <th><?php echo $row['id_proceso']; ?> </th>
                                        <th><?php echo $row['tamaño']; ?> Kb</th>
                                        <th><?php echo $row['duracion']; ?> ms</th>
                                        <th><?php echo $row['prioridad']; ?></th>
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
<script src="../JS/popup.js"></script>

</html>