<?php
class proceso
{
    public $id_proceso;
    public $tamaño;
    public $duracion;
    public $prioridad;
    public $cronometro=0;

    public function __construct($id,$tam,$dur,$pri)
    {
        $this->id_proceso=$id;
        $this->tamaño=$tam;
        $this->duracion=$dur;
        $this->prioridad=$pri;
    }
    public function __construct2()
    {
        
    }

    public function setCronometro($cron)
    {
        $this->cronometro=$cron;
    }
    public function getTamaño()
    {
        return $this->tamaño;
    }
    public function getPrioridad()
    {
        return $this->prioridad;
    }
    public function getDuracion()
    {
        return $this->duracion;
    }
}

?>