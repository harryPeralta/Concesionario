<?php

    class VehiculoController
    {
        public function __construct()
        {
            require_once "models/Vehiculo.php";
            require_once "models/Marca.php";
            require_once "models/Cliente.php";
        }
        public function index()
        {
            $vehiculos = new Vehiculo();
            $data["vehiculos"] = $vehiculos->listar();
            $data["titulo"] = "Vehiculos";
            require_once "views/vehiculos/index.php";
        }
        public function insert()
        {   
            $clientes = new Cliente();
            $data["clientes"] = $clientes->listar();

            $marcas = new Marca();
            $data["marcas"] = $marcas->listar();
            $data["titulo"] = "Crear vehiculo";
            
            require_once "views/vehiculos/insert.php";
            
        } 

        public function store()
        {
            $matricula = $_POST['matricula'];
            $modelo = $_POST['modelo'];
            $color = $_POST['color'];
            $precio = $_POST['precio'];
            $codigoCliente = $_POST['codigoCliente'];
            $codigoMarca = $_POST['codigoMarca'];

            $vehiculo  = new Vehiculo();
            $vehiculo->insert($matricula, $modelo, $color, $precio, $codigoCliente, $codigoMarca);
            $this->index();
        }

        public function edit($matricula)
        {
            $vehiculo = new Vehiculo();
            $marcas = new Marca();
            $clientes = new Cliente();


            $data["matricula"] = $matricula;
            $data["vehiculo"] = $vehiculo->getVehiculo($matricula);
            $data["marcas"] = $marcas->listar();
            $data["clientes"] = $clientes->listar();
            $data["titulo"] = "Actualizar vehiculo";
            
            require_once "views/vehiculos/edit.php";
        }

        public function update()
        {
            $matricula = $_POST['matricula'];
            $modelo = $_POST['modelo'];
            $color = $_POST['color'];
            $precio = $_POST['precio'];
            $codigoCliente = $_POST['codigoCliente'];
            $codigoMarca   = $_POST['codigoMarca'];

            $vehiculo = new vehiculo();
            $vehiculo->update($matricula, $modelo, $color, $precio,  $codigoCliente, $codigoMarca);
            $this->index();
        }

        public function delete($matricula)
        {
            $vehiculo = new Vehiculo();
            $vehiculo->delete($matricula);
            $this->index();
        }
        public function view($matricula)
        {
            $vehiculos = new Vehiculo();
            $data["vehiculo"] = $vehiculos->getVehiculo($matricula);
            $data["titulo"] = "Ver vehiculo";
            require_once "views/vehiculos/view.php";
        }
    }

?>