<?php
class proceso
{
    public $id_proceso;
    public $tamano;
    public $duracion;
    public $prioridad;
    public $estado;
    public $cronometro=0;

    public function __construct($id,$tam,$dur,$pri,$est)
    {
        $this->id_proceso=$id;
        $this->tamano=$tam;
        $this->duracion=$dur;
        $this->prioridad=$pri;
        $this->estado=$est;
    }

    public function setCronometro($cron)
    {
        $this->cronometro=$cron;
    }
    public function setEstado($est)
    {
        $this->estado=$est;
    }
    public function getTamaño()
    {
        return $this->tamano;
    }
    public function getPrioridad()
    {
        return $this->prioridad;
    }
    public function getDuracion()
    {
        return $this->duracion;
    }
    public function getId()
    {
        return $this->id_proceso;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function getCronometro()
    {
        return $this->cronometro;
    }
}

?>