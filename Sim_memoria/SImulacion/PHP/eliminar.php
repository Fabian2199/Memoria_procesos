<?php
    include("conexion.php");
    $memoria = $_GET['id_memoria'];
    $EliminarPr = "DELETE FROM proceso WHERE estado = 'En espera'";
    mysqli_query($conexion, $EliminarPr);
    $ElminarMe="DELETE FROM memoria WHERE id_memoria =$memoria";
    mysqli_query($conexion, $ElminarMe);
    header('Location: ../HTML/index.php');
?>
