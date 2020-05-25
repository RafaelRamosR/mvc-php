<?php

    // Controlador principal
    // Se encarga de poder cargar los modelos y las vistas
    class Controller {
        // cargar modelo
        public function model($model)
        {
            require_once '../app/models/'. $model .'.php';
            // instanciar el modelo
            return new $model();
        }
        
        // cargar vista
        public function view($view, $data = [])
        {
            // se verifica si el archivo existe
            if(file_exists('../app/views/'. $view .'.php')){
                require_once '../app/views/'. $view .'.php';
            }else{
                // si el archivo de la vista no existe
                die('La vista no existe.');
            }
        }
    }