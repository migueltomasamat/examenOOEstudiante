<?php

namespace App\Class;

use App\Model\ExpedienteModelo;

class Expediente implements \JsonSerializable
{
    private ?string $referencia;

    private ?string $contenido;

    private ?\DateTime $fechaModificacion;

    public function getReferencia(): string
    {
        return $this->referencia;
    }

    public function setReferencia(string $referencia): Expediente
    {
        $this->referencia = $referencia;
        return $this;
    }

    public function getContenido(): string
    {
        return $this->contenido;
    }

    public function setContenido(string $contenido): Expediente
    {
        $this->contenido = $contenido;
        return $this;
    }

    public function getFechaModificacion(): \DateTime
    {
        return $this->fechaModificacion;
    }

    public function setFechaModificacion(\DateTime $fechaModificacion): Expediente
    {
        $this->fechaModificacion = $fechaModificacion;
        return $this;
    }

    public function __construct()
    {
        $this->contenido=null;
        $this->fechaModificacion=null;
        $this->referencia=null;
    }

    public function jsonSerialize()
    {
       return [
           "referencia"=>$this->referencia,
           "contenido"=>$this->contenido,
           "fechaModificacion"=>$this->getFechaModificacion()->format('d/m/Y')
       ];
    }

    public function load(){
        ExpedienteModelo::cargarExpediente($this->referencia);
    }

    public function delete(){
        ExpedienteModelo::borrarExpediente($this->referencia);
    }
}