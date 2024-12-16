<?php

namespace App\Model;

use App\Class\Expediente;

class ExpedienteModelo
{

    public static function cargarExpediente(string $referencia):Expediente{
        $dsn = 'mysql:dbname=examenbd;host=mariadbexamen';
        $usuario = 'miguel';
        $contraseña = 'leugim';
        $conexion= new PDO($dsn,$usuario,$contraseña);

        $sql="SELECT referecia,contenido,date_format(fecha_modificacion,'d/m/Y') as fecha_modificacion FROM expediente WHERE referencia=?";

        $setenciaPreparada=$conexion->prepare($sql);

        $setenciaPreparada->bindValue(1,$referencia);

        $resultado = $setenciaPreparada->execute();

        $expediente = new Expediente();

        $expediente->setReferencia($resultado['referecia']);
        $expediente->setContenido($resultado['contenido']);
        $expediente->setFechaModificacion(\DateTime::createFromFormat($resultado['fecha_modificacion'],'d/m/Y'));

        return $expediente;
    }

    public static function borrarExpediente(string $referencia){
        $dsn = 'mysql:dbname=examenbd;host=mariadbexamen';
        $usuario = 'miguel';
        $contraseña = 'leugim';
        $conexion= new PDO($dsn,$usuario,$contraseña);

        $sql="DELETE FROM expediente WHERE referencia=?";

        $setenciaPreparada=$conexion->prepare($sql);

        $setenciaPreparada->bindValue(1,$referencia);

        $resultado = $setenciaPreparada->execute();
    }

}