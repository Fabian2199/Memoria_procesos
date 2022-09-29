<?php
    function getMemoria()
    {
        include('conexion.php');
        $sql_memoria= "SELECT * FROM `memoria`";
        $consulta_memoria= $conexion ->query($sql_memoria);
        return $consulta_memoria;
    };

    function getProceso()
    {
        include('conexion.php');
        $sql_proceso= "SELECT * FROM `proceso` ORDER BY  prioridad ";
        $consulta_proceso= $conexion ->query($sql_proceso);
        return $consulta_proceso;
    }
    function getDatosMemoria($id)
    {
        include('conexion.php');
        $sql_datosMemoria= "SELECT * FROM `memoria` WHERE id_memoria = '$id';";
        $consulta_datosMemoria= $conexion ->query($sql_datosMemoria);
        return $consulta_datosMemoria;
    }
?>