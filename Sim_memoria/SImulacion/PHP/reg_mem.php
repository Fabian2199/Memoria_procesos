<?php
    include("conexion.php");
    $tamañó = $_POST['espacio_memoria'];
    $id = 0;
    $sql = "SELECT MAX(id_memoria) FROM memoria";
    $valor_id = mysqli_query($conexion,$sql);
    $idmax= mysqli_fetch_array($valor_id);
    if($idmax["MAX(id_memoria)"]!=null){
        $id=$idmax["MAX(id_memoria)"]+1;
    }
    $registro = "INSERT INTO `memoria` (`id_memoria`, `tamaño`) VALUES ('$id', '$tamañó')";
    $validar = mysqli_query($conexion,$registro);
    header('Location: ../HTML/index.php');
?>