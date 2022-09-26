<?php
    include("conexion.php");
    $tamañó = $_POST['espacio'];
    $duracion = $_POST['duracion'];
    $prioridad = $_POST['prioridad'];
    $id = 0;
    $sql = "SELECT MAX(id_proceso) FROM proceso";
    $valor_id = mysqli_query($conexion,$sql);
    $idmax= mysqli_fetch_array($valor_id);
    if($idmax["MAX(id_proceso)"]!=null){
        $id=$idmax["MAX(id_proceso)"]+1;
    }
    $registro = "INSERT INTO `proceso` (`id_proceso`, `tamaño`, `duracion`, `prioridad`) VALUES ('$id', '$tamañó', '$duracion', '$prioridad')";
    $validar = mysqli_query($conexion,$registro);
    header('Location: ../HTML/index.php');
?>