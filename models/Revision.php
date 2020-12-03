<?php

class Revision
{
    private $db;
    private $revisiones;

    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->revisiones = array();
    }

    public function listar()
    {
        $sql =  "SELECT revision.codigo, revision.cambioFrenos, revision.cambioAceite, revision.cambioFiltros, revision.otros, revision.matriculaVehiculo " .
                "FROM revision " .
                "JOIN vehiculo " . 
                "ON revision.matriculaVehiculo = vehiculo.matricula ";
                $resultado = $this->db->query($sql);
        if(!$resultado)
        {
            echo "Lo sentimos este sitio está experimentndo problemas.\n\n";

            echo "Eror: La ejecución de la consulta falla debido a :\n";
            echo "Query : " . $sql . "\n";
            echo "Errno" . $mysqli->errno . "\n" ;
            echo "Error" . $mysqli->error . "\n" ;
            exit;
        }

        while ($row = $resultado->fetch_assoc())
        {
            $this->revisiones[] = $row;
        }
        return $this->revisiones;
    }

    public function insert($codigo, $cambioFrenos, $cambioAceite, $cambioFiltros, $otros, $matriculaVehiculo)
    {
        $sql = "INSERT INTO revision  (cambioFrenos, cambioAceite, cambioFiltros, otros, matriculaVehiculo) VALUES ('$cambioFrenos', '$cambioAceite', '$cambioFiltros', '$otros', '$matriculaVehiculo')";
        $this->db->query($sql);
    }

    public function update($codigo, $cambioFrenos, $cambioAceite, $cambioFiltros, $otros, $matriculaVehiculo)
    {
        $sql ="UPDATE revision SET cambioFrenos = '$cambioFrenos', cambioAceite = '$cambioAceite', cambioFiltros = '$cambioFiltros', otros = '$otros', matriculaVehiculo = '$matriculaVehiculo' WHERE codigo = $codigo";
        $resultado = $this->db->query($sql);
    }

    public function delete($codigo)
    {
        $sql = "DELETE FROM revision WHERE codigo = $codigo";
        $resultado = $this->db->query($sql);
    }

    public function view($codigo)
    {
        $sql = "SELECT FROM revision WHERE codigo = $codigo";
        $resultado = $this->db->query($sql);
    }

    public function getRevision($codigo)
    {
        $sql =  "SELECT revision.codigo, revision.cambioFrenos, revision.cambioAceite, revision.cambioFiltros, revision.otros, revision.matriculaVehiculo " .
                "FROM revision " .
                "JOIN vehiculo " . 
                "ON revision.matriculaVehiculo = vehiculo.matricula " . 
                "WHERE revision.codigo = $codigo";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row;
    }
}

?>