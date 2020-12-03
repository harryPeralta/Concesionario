<?php 
    class Marca
    {
        private $db;
        private $marcas;
        private $identificador;


        public function __construct()
        {
            $this->db = Conectar::conexion();
            $this->marcas = array();
            $this->identificador = null;

        }

        public function listar()
        {
            $sql = "SELECT * FROM marca";
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
                $this->marcas[] = $row;
            }
            return $this->marcas;
        }

        public function insert($codigo, $descripcion)
        {
            $this->identificador = $codigo;
            $sql = "INSERT INTO marca (codigo, descripcion) VALUES ($codigo, '$descripcion')"; 
            $this->db->query($sql); 
        }
        public function update($codigo, $descripcion)
        {
            $sql = "UPDATE marca SET descripcion = '$descripcion' WHERE codigo = $codigo";
            $resultado = $this->db->query($sql);
        }

        public function delete($codigo)
        {
            $sql = "DELETE FROM marca WHERE codigo = $codigo";
            $resultado = $this->db->query($sql);
        }

        public function getMarca($codigo)
        {
            $sql = "SELECT * FROM marca WHERE codigo = $codigo";
            $resultado = $this->db->query($sql);
            $row = $resultado->fetch_assoc();
            return $row;
        }
        public function view($codigo)
        {   
            $sql = "SELECT * FROM marca WHERE codigo = $codigo";
            $resultado = $this->db->query($sql);
        }
    }

?>