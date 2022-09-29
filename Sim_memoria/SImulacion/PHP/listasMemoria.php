<?php
include("proceso.php");
function procesosActivos($listaProceso)
{
    $listActivos = array();
    while ($row = $listaProceso->fetch_assoc()) {
        $proceso_i = new proceso($row['id_proceso'], $row['tamaño'], $row['duracion'], $row['prioridad'],$row['estado']);
        array_push($listActivos, $proceso_i);
    }
    return $listActivos;
}
function simMemoria($tam, $activos)
{
    $procesos_memoria = array();
    
    $contador= count($activos);
    for ($i = 0; $i < $contador; $i++) {
        $tamaño = $activos[$i]->getTamaño();
        if ($tam >= $tamaño) {
            $estado ="Ejecutando";
            $activos[$i]->setEstado($estado);
            array_push($procesos_memoria, $activos[$i]);
            $tam = $tam - $tamaño;
        } 
    }
    
    return $procesos_memoria;
}
