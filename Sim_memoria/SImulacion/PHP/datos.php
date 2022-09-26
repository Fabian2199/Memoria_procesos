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
        $sql_proceso= "SELECT * FROM `proceso`";
        $consulta_proceso= $conexion ->query($sql_proceso);
        return $consulta_proceso;
    }
?>