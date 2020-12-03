<?php 
    class Vehiculo
    {
        private $db;
        private $vehiculos;
        private $identificador;

        public function __construct()
        {
            $this->db = Conectar::conexion();
            $this->vehiculos = array();
            $this->identificador = null;
        }

        public function listar()
        {
            $sql = "SELECT vehiculo.matricula, vehiculo.modelo, vehiculo.color , vehiculo.precio, marca.descripcion AS marca , cliente.nombre AS nombreCliente " .
                    "FROM vehiculo " .
                    "INNER JOIN marca ON vehiculo.codigoMarca = marca.codigo " . 
                    "INNER JOIN cliente ON vehiculo.codigoCliente  = cliente.codigo ";   
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
                $this->vehiculos[] = $row;
            }
            return $this->vehiculos;
        }

        public function insert($matricula, $modelo, $color, $precio, $codigoCliente, $codigoMarca)
        {
            $this->identificador = $matricula;
            $sql = "INSERT INTO vehiculo (matricula, modelo, color, precio, codigoCliente, codigoMarca) VALUES ('$matricula', $modelo, '$color', $precio, $codigoCliente, $codigoMarca)"; 
            $this->db->query($sql); 
        }
        
        public function update($matricula, $modelo, $color, $precio, $codigoCliente, $codigoMarca)
        {
            $sql = "UPDATE vehiculo SET modelo = $modelo, color = '$color', precio = $precio, codigoCliente = $codigoCliente, codigoMarca= $codigoMarca WHERE matricula = '$matricula'";
            $resultado = $this->db->query($sql);
        }

        public function delete($matricula)
        {
            $sql = "DELETE FROM vehiculo WHERE matricula = '$matricula'";
            $resultado = $this->db->query($sql);
        }

        public function getVehiculo($matricula)
        {
            $sql = "SELECT * " .
                    "FROM vehiculo " .
                    "INNER JOIN marca ON vehiculo.codigoMarca = marca.codigo " . 
                    "INNER JOIN cliente ON vehiculo.codigoCliente  = cliente.codigo " .
                    "WHERE vehiculo.matricula = '$matricula'";
            $resultado = $this->db->query($sql);
            $row = $resultado->fetch_assoc();
            return $row;
        }

        public function view($matricula)
        {   
            $sql = "SELECT * FROM vehiculo WHERE matricula = '$matricula'";
            $resultado = $this->db->query($sql);
        }
    }

?>