<?php
/*
Mapear la URL ingresada en el navegador:
1-controlador
2. método
3. parámetro
*/

class Core {
	protected $controladorActual = 'pages';
	protected $metodoActual = 'index';
	protected $parametros = [];

	public function __construct()
	{
		$url = $this->getUrl();
		
		/*
			verificar que controlador exista
			si existe, será el controlador por defecto
		*/
		if(file_exists('../app/controllers/'.ucwords($_GET['url']).'.php')) {
			$this->controladorActual = ucwords($url[0]);

			// elimina el controlador por defecto anterior
			unset($url[0]);
		}
		// traer el nuevo controlador
		require_once '../app/controllers/'.$this->controladorActual.'.php';
		$this->controladorActual = new $this->controladorActual;
	}

	// Se extrae la url sin barras diagónales (/)
	public function getUrl()
	{
		// la url viene del htaccess
		//echo $_GET['url'];
		if(isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
}
