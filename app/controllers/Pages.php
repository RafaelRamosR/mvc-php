<?php

    class Pages extends Controller {
        public function __construct()
        {
            $this->articleModel = $this->model('Article');
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
            $articles = $this->articleModel->getArticles();
            
            // Pasar parámetros
            $data = [
                'titulo' => 'Bienvenido a la prueba de MVC',
                'articulos' => $articles
            ];
            # php-mvc/pages/articles
            $this->view('pages/articles', $data);
        }

        public function update($num) 
        {
            echo $num;
        }
    }