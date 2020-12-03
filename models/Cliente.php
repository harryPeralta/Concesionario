<?php 
    class Cliente
    {
        private $db;
        private $clientes;
        private $identificador;

        public function __construct()
        {
            $this->db = Conectar::conexion();
            $this->clientes = array();
            $this->identificador = null;
        }

        public function listar()
        {
            $sql =  "SELECT cliente.codigo, cliente.identificacion, cliente.nombre, cliente.direccion, cliente.telefono, ciudad.nombre AS ciudad " .
                    "FROM cliente " .
                    "JOIN ciudad " .
                    "ON cliente.codigoCiudad = ciudad.codigo";
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
                $this->clientes[] = $row;
            }
            return $this->clientes;
        }

        public function insert($codigo, $identificacion, $nombre, $direccion, $telefono, $codigoCiudad)
        {
            $this->identificador = $codigo;
            $sql = "INSERT INTO cliente (identificacion, nombre, direccion, telefono , codigoCiudad) VALUES ( $identificacion, '$nombre', '$direccion', $telefono, $codigoCiudad)"; 
            $this->db->query($sql); 
        }
        public function update($codigo, $identificacion, $nombre, $direccion, $telefono, $codigoCiudad)
        {
            $sql = "UPDATE cliente SET identificacion = $identificacion, nombre = '$nombre', direccion = '$direccion', telefono = $telefono, codigoCiudad = $codigoCiudad WHERE codigo = $codigo"; 
            $resultado = $this->db->query($sql);
        }
        public function getCliente($codigo)
        {
            $sql = "SELECT cliente.codigo, cliente.identificacion, cliente.nombre, cliente.direccion, cliente.telefono, ciudad.nombre AS ciudad " .
                    "FROM cliente " .
                    "JOIN ciudad " .
                    "ON cliente.codigoCiudad = ciudad.codigo " . 
                    "WHERE cliente.codigo = $codigo";            
                    
            $resultado = $this->db->query($sql);
            $row = $resultado->fetch_assoc();
            return $row;
        }
        public function delete ($codigo)
        {
            $sql = "DELETE FROM cliente WHERE codigo = $codigo";
            $resultado = $this->db->query($sql);
        }
        public function view()
        {
            $sql = "SELECT * FROM cliente WHERE codigo = $codigo";
            $resultado = $this->db->query($sql);

        }
    }

?>