<?php

class Conectar
{
    public static function conexion()
    {
        $conexion = new mysqli("localhost","root","","concesionario");
        if(!$conexion)
        {
            die("Conexion fallida" . mysqli_connect_error());
        }
        return $conexion;
    }
}

?>