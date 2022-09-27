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
    if (empty($procesos_memoria)) {
        array_push($procesos_memoria,$tam);
        array_push($procesos_memoria, $activos[0]);
    } else {
        $contador= count($activos);
        for ($i = 1; $i < $contador; $i++) {
            $tamaño = $activos[$i]->getTamaño();
            if ($activos[0] > $tamaño) {
                $estado ="Ejecutando";
                $activos[$i]->setEstado($estado);
                array_push($procesos_memoria, $activos[$i]);
                $activos[0] = $activos[0] - $tamaño;
                unset($activos[$i]);
                $contador--;
            } 
        }
    }

    return $procesos_memoria;
}
function ejecProceso($proceso, $temporizador,$id_m,$tam)
{
    include("reg_proce_ter.php");
    $duracion = $proceso->getDuracion();
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
    return $tam;
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
    return $tam;
}
function ejecProcesosSim($procesos_memoria,$temporizador,$id_m,$tam)
{
    $tam_Actual =$tam;
    while ($tam==$tam_Actual) {
        $contador = count($procesos_memoria);
        for ($i=0; $i <$contador ; $i++) { 
            $tam_Actual = ejeUnProceso($procesos_memoria[$i],$temporizador,$id_m,$tam);
            if ($tam_Actual!=$tam) {
                unset($procesos_memoria[$i]);
            }
        }
    }
}
