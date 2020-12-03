<?php

    class CiudadController
    {
        public function __construct()
        {
            require_once "models/Ciudad.php";
        }
        public function index()
        {
            $ciudades = new Ciudad();
            $data["ciudades"] = $ciudades->listar();
            $data["titulo"] = "Ciudades";
            require_once "views/ciudades/index.php";
        }
        public function insert()
        {
            $data["titulo"] = "crear ciudad";
            require_once "views/ciudades/insert.php";
            
        } 

        public function store()
        {
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];


            $ciudad  = new Ciudad();
            $ciudad->insert($codigo, $nombre);
            $this->index();
        }
        public function edit($codigo)
        {
            $ciudad = new Ciudad();
            $data["codigo"] = $codigo;
            $data["ciudad"] = $ciudad->getCiudad($codigo);
            $data["titulo"] = "Actualizar ciudad";
            require_once "views/ciudades/edit.php";
        }

        public function update()
        {
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];

            $ciudad = new Ciudad();
            $ciudad->update($codigo, $nombre);
            $this->index();
        }
        public function delete($codigo)
        {
            $ciudad = new Ciudad();
            $ciudad->delete($codigo);
            $this->index();
        }
        public function view($codigo)
        {
            $ciudades = new Ciudad();
            $data["ciudad"] = $ciudades->getCiudad($codigo);
            $data["titulo"] = "ver ciudad";
            require_once "views/ciudades/view.php";
        }
    }

?>