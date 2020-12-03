<?php

class RevisionController
{
    public function __construct()
    {
        require_once "models/Vehiculo.php";
        require_once "models/Revision.php";
    }

    public function index()
    {
        $revisiones = new Revision();
        $data["revisiones"] = $revisiones->listar();
        $data["titulo"] = "Revisiones";
        
        //cargar la vista
        require_once "views/revisiones/index.php";
    }

    //mostrar la vista, para crear un nuevo registro (producto)
    public function insert()
    {
        $vehiculos = new Vehiculo();
        $data["vehiculos"] = $vehiculos->listar();
        $data["titulo"] = "Crear revision";
        
        require_once "views/revisiones/insert.php";
    }

    //guarda el registro
    public function store()
    {
        
        //recibir los datos a aguardar
        $codigo = $_POST['codigo'];
        $cambioFrenos = $_POST['cambioFrenos'];
        $cambioAceite = $_POST['cambioAceite'];
        $cambioFiltros = $_POST['cambioFiltros'];
        $otros = $_POST['otros'];
        $matriculaVehiculo = $_POST['matriculaVehiculo'];

        $revision = new Revision();
        $revision->insert($codigo, $cambioFrenos, $cambioAceite, $cambioFiltros, $otros, $matriculaVehiculo);
        $this->index();

        require_once "views/revisiones/index.php";
    }
    
    public function edit($codigo)
    {
        $revision = new Revision();
        $vehiculos = new Vehiculo();
        //Pasar a la vista el codigo y el vehicul
        $data["codigo"] = $codigo;
        $data["revision"] = $revision->getRevision($codigo);
        $data["vehiculos"] = $vehiculos->listar();
        $data["titulo"] = "Actualizar revision";
        
        require_once "views/revisiones/edit.php";
    }

    public function update()
    {
        $codigo = $_POST['codigo'];
        $cambioFrenos = $_POST['cambioFrenos'];
        $cambioAceite = $_POST['cambioAceite'];
        $cambioFiltros = $_POST['cambioFiltros'];
        $otros = $_POST['otros'];
        $matriculaVehiculo = $_POST['matriculaVehiculo'];

        $revision = new Revision();
        $revision->update($codigo, $cambioFrenos, $cambioAceite, $cambioFiltros, $otros, $matriculaVehiculo);
        $this->index();
    }
    public function delete($codigo)
    {
        $revision = new Revision();
        $revision->delete($codigo);
        $this->index();
    }

    public function view($codigo)
    {
        $revision = new Revision();
        $data["codigo"] = $codigo;
        $data["revision"] = $revision->getRevision($codigo);
        $data["titulo"] = "Ver revision";
        require_once "views/revisiones/view.php";
    }
}
?>