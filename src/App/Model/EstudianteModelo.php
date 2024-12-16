<?php

namespace App\Model;

use App\Class\Estudiante;

class EstudianteModelo
{

    public static function guardarEstudiante(Estudiante $estudiante){
        $dsn = 'mysql:dbname=examenbd;host=mariadbexamen';
        $usuario = 'miguel';
        $contraseña = 'leugim';
        $conexion= new PDO($dsn,$usuario,$contraseña);

        $sql="INSERT INTO estudiante ('nia','nombre','correo') VALUES (?,?,?)";

        $setenciaPreparada=$conexion->prepare($sql);

        $setenciaPreparada->bindValue(1,$estudiante->getNIA());
        $setenciaPreparada->bindValue(1,$estudiante->getNombre());
        $setenciaPreparada->bindValue(1,$estudiante->getCorreo());

        $setenciaPreparada->execute();
    }

}