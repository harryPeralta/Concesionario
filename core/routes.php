<?php

    function cargarControlador($controlador)
    {
        $nombreControlador = ucwords($controlador) . "Controller";
        $archivoControlador = "controllers/$nombreControlador.php";
        
        if(!is_file($archivoControlador))
        {
            $archivoControlador = "controllers/" . CONTROLADOR_PRINCIPAL . ".php";
        }

        require_once $archivoControlador;
        $controlador = new $nombreControlador();
        return $controlador;
    
    }

    function cargarAccion($controlador,$accion, $identificador = null)
    {
        if(isset($accion) && method_exists($controlador, $accion))
        {
            if($identificador == null)
            {
                $controlador->$accion();
            }
            else
            {
                $controlador->$accion($identificador);
            }
        }
        else
        {
            $controlador->ACCION_PRINCIPAL();
        }
    }

    
?>