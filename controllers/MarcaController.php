<?php

    class MarcaController
    {
        public function __construct()
        {
            require_once "models/Marca.php";
        }
        public function index()
        {
            $marcas = new Marca();
            $data["marcas"] = $marcas->listar();
            $data["titulo"] = "Marcas";
            require_once "views/marcas/index.php";
        }
        public function insert()
        {
            $data["titulo"] = "crear una marca";
            require_once "views/marcas/insert.php";
            
        } 

        public function store()
        {
            $codigo = $_POST['codigo'];
            $descripcion = $_POST['descripcion'];


            $marca  = new Marca();
            $marca->insert($codigo, $descripcion);
            $this->index();
        }
        public function edit($codigo)
        {
            $marca = new Marca();
            $data["codigo"] = $codigo;
            $data["marca"] = $marca->getMarca($codigo);
            $data["titulo"] = "Actualizar marca";
            require_once "views/marcas/edit.php";
        }

        public function update()
        {
            $codigo = $_POST['codigo'];
            $descripcion = $_POST['descripcion'];

            $marca = new Marca();
            $marca->update($codigo, $descripcion);
            $this->index();
        }
        public function delete($codigo)
        {
            $marca = new Marca();
            $marca->delete($codigo);
            $this->index();
        }
        public function view($codigo)
        {
            $marcas = new Marca();
            $data["marca"] = $marcas->getMarca($codigo);
            $data["titulo"] = "Actualizar marca";
            require_once "views/marcas/view.php";
        }
    }

?>