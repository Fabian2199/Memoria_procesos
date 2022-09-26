<?php
    include("proceso.php");
    function procesosActivos($listaProceso)
    {
        $listActivos= array();
        while ($row=$listaProceso->fetch_assoc()) {
            $proceso_i= new proceso($row['id_proceso'],$row['tamaño'],$row['duracion'],$row['prioridad']);
            array_push($listActivos,$proceso_i);
        }
        return $listActivos;
    }
    function simMemoria ($tam,$activos)
    {
        $procesos_memoria = array();
        if (empty($procesos_memoria)) {
            array_push($procesos_memoria,$activos[0]);
        }
        else {
            for ($i=0; $i < count($activos); $i++) { 
                $tamaño = $activos[$i]->getTamaño();
                $prioridad = $activos[$i]->getPrioridad();
                if (($tam>$tamaño) and ($prioridad= 'Alta') ) {
                    array_push($procesos_memoria,$activos[$i]);
                }elseif (($tam>$activos) and ($prioridad= 'Alta')) {
                    # code...
                }else {
                    # code...
                }
            }
        }
    }
?>