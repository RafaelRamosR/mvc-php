<?php

    class Pages {
        public function __construct()
        {
            //echo 'Controlador páginas cargando';
        }

        public function index()
        {
            # método por defecto
        }

        public function articles() 
        {

        }

        public function update($num) 
        {
            echo $num;
        }
    }