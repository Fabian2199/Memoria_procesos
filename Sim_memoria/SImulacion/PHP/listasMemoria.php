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
function actualizarActivos($listaActivos,$listaEjecutando)
{
    for ($i = 1; $i < count($listaEjecutando); $i++) {
        $indice = array_search($listaEjecutando[2], $listaActivos);
        unset($listaActivos[$indice]);
    }
    return $listaActivos;
}
function simMemoria($tam, $activos)
{
    $procesos_memoria = array();
    array_push($procesos_memoria,$tam);
    
    $contador= count($activos);
    for ($i = 0; $i < $contador; $i++) {
        $tamaño = $activos[$i]->getTamaño();
        if ($procesos_memoria[0] > $tamaño) {
            $estado ="Ejecutando";
            $activos[$i]->setEstado($estado);
            array_push($procesos_memoria, $activos[$i]);
            $procesos_memoria[0] = $procesos_memoria[0] - $tamaño;
        } 
    }
    
    return $procesos_memoria;
}
function ejecProceso($proceso, $temporizador,$id_m,$tam)
{
    include("reg_proce_ter.php");
    $duracion = intval($proceso->getDuracion());
    while ($duracion != 0) {
        $duracion--;
        if ($duracion == 0) {
            $time_act = intval(date('s'));
            $id_p= $proceso->getId();
            $dur= $temporizador-$time_act;
            $tam = $tam+$proceso->getTamaño();
            reg_proce_term($id_m,$id_p,$dur);
        }
    }
    return $duracion;
}
function ejeUnProceso($proceso, $temporizador,$id_m,$tam)
{
    include("reg_proce_ter.php");
    $duracion = $proceso->getDuracion();
    $crono = $proceso->getCronometro();
    $crono++;
    if ($duracion == $crono) {
        $time_act = intval(date('s'));
        $id_p= $proceso->getId();
        $dur= $temporizador-$time_act;
        $tam = $tam+$proceso->getTamaño();
        reg_proce_term($id_m,$id_p,$dur);
    }
    $proceso->setCronometro($crono);
    return $duracion;
}
function ejecProcesosSim($procesos_memoria,$temporizador,$id_m,$tam)
{
    $tam_Actual =$tam;
    while ($tam==$tam_Actual) {
        foreach ($procesos_memoria as $proceso ) 
        { 
            /*$tam_Actual = ejeUnProceso($proceso,$temporizador,$id_m,$tam);
            if ($tam_Actual!=$tam) {
                unset($proceso);
            }*/
        }
    }
}
