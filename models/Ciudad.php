<?php 
    class Ciudad
    {
        private $db;
        private $ciudades;
        private $identificador;


        public function __construct()
        {
            $this->db = Conectar::conexion();
            $this->ciudades = array();
            $this->identificador = null;

        }

        public function listar()
        {
            $sql = "SELECT * FROM ciudad";
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
                $this->ciudades[] = $row;
            }
            return $this->ciudades;
        }

        public function insert($codigo, $nombre)
        {
            $this->identificador = $codigo;
            $sql = "INSERT INTO ciudad (codigo, nombre) VALUES ($codigo, '$nombre')"; 
            $this->db->query($sql); 
        }
        public function update($codigo, $nombre)
        {
            $sql = "UPDATE ciudad SET nombre = '$nombre' WHERE codigo = $codigo";
            $resultado = $this->db->query($sql);
        }

        public function delete($codigo)
        {
            $sql = "DELETE FROM ciudad WHERE codigo = $codigo";
            $resultado = $this->db->query($sql);
        }

        public function getCiudad($codigo)
        {
            $sql = "SELECT * FROM ciudad WHERE codigo = $codigo";
            $resultado = $this->db->query($sql);
            $row = $resultado->fetch_assoc();
            return $row;
        }
        public function view($codigo)
        {   
            $sql = "SELECT * FROM ciudad WHERE codigo = $codigo";
            $resultado = $this->db->query($sql);
        }
    }

?>