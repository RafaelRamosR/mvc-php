<?php

    class Pages extends Controller {
        public function __construct()
        {
            //echo 'Controlador páginas cargando';
        }

        // método por defecto
        public function index()
        {
            // Pasar parámetros
            $data = [
                'titulo' => 'Bienvenido a la prueba de MVC'
            ];
            $this->view('pages/home', $data);
        }

        public function articles() 
        {
            # php-mvc/pages/articles
            $this->view('pages/articles');
        }

        public function update($num) 
        {
            echo $num;
        }
    }