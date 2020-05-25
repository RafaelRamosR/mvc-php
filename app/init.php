<?php
// Cargar librerías
require_once 'config/config.php';

// Autoload para cargar las clases
spl_autoload_register(function($className){
    require_once 'libs/'. $className .'.php';
});