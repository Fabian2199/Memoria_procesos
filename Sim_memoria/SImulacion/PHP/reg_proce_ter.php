<?php
    function reg_proce_term($id_m, $id_p, $duracion)
    {
        include("conexion.php");
        $registro = "INSERT INTO `procesos_terminados` (`id_memoria`, `id_proceso`, `duracion`) VALUES ('$id_m', '$id_p', '$duracion')";
        mysqli_query($conexion, $registro);
        header('Location: ../HTML/index.php');
    }
?>
