<?php
include("../PHP/datos.php");
$memoria = getMemoria();
$proceso = getProceso();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Index</title>
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

            <!-- clase overlay es una ventana emergente para agregar un cliente -->
            <div class="overlay" id="overlay">
                <div class="popup" id="popup">
                    <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                    <h3>Añadir proceso</h3>
                    <h4>Completa el siguiente formulario</h4>
                    <form action="../PHP/reg_proce.php" method="post">
                        <div class="contenedor-inputs">
                            <input type="number" placeholder="Espacio de memoria" name="espacio" pattern="[0-9]+" required>
                            <input type="number" placeholder="Duracion proceso" name="duracion" pattern="[0-9]+" required>
                            <input type="number" placeholder="Prioridad" name="prioridad" pattern="[0-9]+" min="0" max="19" required>
                        </div>
                        <input type="submit" class="btn-submit" id="btn-submit" value="AÑADIR">
                    </form>
                </div>
            </div>
    </header>
    <main>
        <div class="principal" id="principal">
            <div for="tar" class="datos_memoria">
                <div class="datos " id="tar">
                    <div class="adelante">
                        <h1>Crear memoria</h1>
                        <form action="../PHP/reg_mem.php" method="post">
                            <div class="contenedor-inputs">
                                <input type="number" placeholder="Espacio de memoria" name="espacio_memoria" pattern="[0-9]+" required>
                            </div>
                            <input type="submit" class="btn-submit" id="btn-submit" value="AÑADIR">
                        </form>
                    </div>
                </div>
            </div>
            <div for="tar" class="procesos_lista">
                <div class="proceso" id="tar">
                    <div class="adelante">
                        <h1>Lista de procesos</h1>
                        <table>
                            <thead>
                                <th>ID_memoria</th>
                                <th>Espacio de memoria</th>
                                <th>Agregar proceso</th>
                                <th>Simular</th>
                            </thead>
                            <tbody>
                                <?php while ($row = $memoria->fetch_assoc()) { ?>
                                    <tr>
                                        <th><?php echo $row['id_memoria']; ?> </th>
                                        <th><?php echo $row['tamaño']; ?> Kb</th>
                                        <th> <button id="btn-abrir-popup" class="btn-abrir-popup"><img src="../img_gen/plus.png" class="plus"></button> </th>
                                        <th><a href="../HTML/sim.php?id_memoria=<?php echo $row['id_memoria']; ?>" >Simular</a></th>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <table>
                            <thead>
                                <th>ID_proceso</th>
                                <th>Espacio en memoria</th>
                                <th>Tiempo de ejecucion</th>
                                <th>Prioridad</th>
                            </thead>
                            <tbody>
                                <?php while ($row = $proceso->fetch_assoc()) { ?>
                                    <tr>
                                        <th>PR <?php echo $row['id_proceso']; ?> </th>
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