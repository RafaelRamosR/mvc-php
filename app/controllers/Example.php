<?php

    class Example extends Controller{
        public function __construct()
        {
            echo 'Controlador example cargando';
        }

        public function articles() 
        {
            $this->view('pages/info');
        }
    }