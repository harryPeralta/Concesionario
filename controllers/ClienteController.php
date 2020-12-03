<?php

    class ClienteController
    {
        public function __construct()
        {
            require_once "models/Cliente.php";
            require_once "models/Ciudad.php";
            
        }
        public function index()
        {
            $clientes = new Cliente();
            $data["clientes"] = $clientes->listar();
            $data["titulo"] = "Clientes";
            require_once "views/clientes/index.php";
        }
        public function insert()
        {
            $ciudades = new Ciudad();
            $data["ciudades"] = $ciudades->listar();
            $data["titulo"] = "crear cliente";

            require_once "views/clientes/insert.php";
         
        } 
        //Guardar el registro
        public function store()
        {
            //Recibir los datos a guardar
            
            $codigo = $_POST['codigo'];
            $identificacion = $_POST ['identificacion'];
            $nombre = $_POST ['nombre'];
            $direccion = $_POST ['direccion'];
            $telefono = $_POST ['telefono'];
            $codigoCiudad = $_POST ['codigoCiudad'];
         

        $cliente = new Cliente();
        $cliente->insert($codigo, $identificacion, $nombre, $direccion ,$telefono, $codigoCiudad);
        $this->index();
        }
        public function edit($codigo)
        {
            $cliente = new Cliente();
            $ciudades = new Ciudad();
            
            $data["codigo"] = $codigo;
            $data["cliente"] = $cliente->getCliente($codigo);
            $data["ciudades"] = $ciudades->listar();
            $data["titulo"] = "Actualizar cliente";
            

            require_once "views/clientes/edit.php";
        }
        public function update()
        {
            $codigo = $_POST ['codigo'];
            $identificacion = $_POST ['identificacion'];
            $nombre = $_POST ['nombre'];
            $direccion = $_POST ['direccion'];
            $telefono = $_POST ['telefono'];
            $codigoCiudad = $_POST ['codigoCiudad'];

            $cliente = new Cliente();
            $cliente->update($codigo, $identificacion, $nombre, $direccion ,$telefono, $codigoCiudad);
            $this->index();
        }
        public function delete($codigo)
        {
            $cliente = new Cliente();
            $cliente->delete($codigo);
            $this->index();
        }
        public function view($codigo)
        {
            $cliente = new Cliente();
            $data["cliente"] = $cliente->getCliente($codigo);
            $data["titulo"] = "ver cliente";
            require_once "views/clientes/view.php";
        }
    }


?>