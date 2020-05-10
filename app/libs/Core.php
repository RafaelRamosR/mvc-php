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
		if(file_exists('../app/controladores/'. ucwords($url[0]).'.php')) {
            //Si existe se setea como controlador por defecto
            $this->controladorActual = ucwords($url[0]);            
            //unset indice
            unset($url[0]);
        }
		// verificar que controlador exista
		// si existe, será el controlador por defecto
		if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')) {
			$this->controladorActual = ucwords($url[0]);

			// elimina el controlador por defecto anterior
			unset($url[0]);
		}
		// traer el nuevo controlador
		require_once '../app/controllers/'.$this->controladorActual.'.php';
		$this->controladorActual = new $this->controladorActual;

		// Métodos URL
		// verificar si la url tiene segunda parte (método)
		if(isset($url[1])) {
			if (method_exists($this->controladorActual, $url[1])) {
				// declaramos el método
				$this->metodoActual = $url[1];
				unset($url[1]);
			}
		}
		
		// Parámetros
		// obtener parámetros
		$this->parametros = $url ? array_values($url) : [];

		// llamar callback con array de parámetros
		call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
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
