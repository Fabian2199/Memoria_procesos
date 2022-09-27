<?php
include("proceso.php");
function procesosActivos($listaProceso)
{
    $listActivos = array();
    while ($row = $listaProceso->fetch_assoc()) {
        $proceso_i = new proceso($row['id_proceso'], $row['tamaño'], $row['duracion'], $row['prioridad']);
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
            $prioridad = $activos[$i]->getPrioridad();
            if (($activos[0] > $tamaño) and ($prioridad == 'Alta')) {
                array_push($procesos_memoria, $activos[$i]);
                $activos[0] = $activos[0] - $tamaño;
                unset($activos[$i]);
                $contador--;
            } elseif (($activos[0] > $$tamaño) and ($prioridad == 'Media')) {
                array_push($procesos_memoria, $activos[$i]);
                $activos[0] = $activos[0]- $tamaño;
                unset($activos[$i]);
                $contador--;
            } elseif (($activos[0]> $$tamaño) and ($prioridad == 'Baja')) {
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
?>