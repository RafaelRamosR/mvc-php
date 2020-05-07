<?php
/*
Mapear la URL ingresada en el navegador:
1-controlador
2. método
3. parámetro
*/

class Core {
	protected $controladorActual = 'paginas';
	protected $metodoActual = 'index';
	protected $parametros = [];

	public function __contruct() {
		$url = $this->getUrl();
	}

	public function getUrl() {
		// la url viene del htaccess
		echo $_GET['url'];
	}
}