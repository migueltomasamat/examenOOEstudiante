<?php

namespace App\Class;

use App\Model\EstudianteModelo;

class Estudiante implements \JsonSerializable
{
    private int $NIA;

    private string $nombre;

    private string $correo;

    private Expediente $expediente;

    public function getNIA(): int
    {
        return $this->NIA;
    }

    public function setNIA(int $NIA): Estudiante
    {
        $this->NIA = $NIA;
        return $this;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): Estudiante
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getCorreo(): string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): Estudiante
    {
        $this->correo = $correo;
        return $this;
    }

    public function getExpediente(): Expediente
    {
        return $this->expediente;
    }

    public function setExpediente(Expediente $expediente): Estudiante
    {
        $this->expediente = $expediente;
        return $this;
    }

    public function save(){
        EstudianteModelo::guardarEstudiante($this);
    }


    public function jsonSerialize()
    {
        return [
            "NIA"=>$this->NIA,
            "nombre"=>$this->nombre,
            "correo"=>$this->correo,
            "expediente"=>$this->expediente
        ];
        // TODO: Implement jsonSerialize() method.
    }
}