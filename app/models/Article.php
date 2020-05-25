<?php

    class Article {
        private $db;

        public function __construct()
        {
            $this->db = new DB;
        }

        public function getArticles()
        {
            $this->db->query("SELECT * FROM articulos");

            return $this->db->registers();
        }
    }