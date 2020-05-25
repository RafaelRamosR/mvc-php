<?php
    // Clase para conectar a la base de datos y ejecutar consultas PDO
    class DB {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASSWORD;
        private $db_name = DB_NAME;

        private $dbh;
        private $stmt; // statment
        private $error;

        public function __construct()
        {
            // configurar conexión
            $dsn = 'mysql::host=' . $this->host . ';dbname=' . $this->db_name;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            
            // Instancia de PDO
            try
            {
                //$this->dbh = new PDO('mysql:host=localhost;dbname=cms', $this->user, $this->password);
                $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
                // Carácteres especiales jaja-people
                $this->dbh->exec('set names utf8');
            }
            catch (PDOException $e)
            {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        //Preparar la consulta
        public function query($sql)
        {
            $this->stmt = $this->dbh->prepare($sql);
        }

        // Vincular la consulta con bind
        public function bind($parameter, $value, $type = null)
        {
            if (is_null($type)) {
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                        break;
                }
            }
            $this->stmt->bindValue($parameter, $value, $type);
        }

        // Ejecutar la consulta
        public function execute()
        {
            return $this->stmt->execute();
        }

        // Obtener todos los registros
        public function registers()
        {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // Obtener un solo registro
        public function register()
        {
            $this->execute();
            return $this->stmt->rowCount();
        }

        // Obtener cantidad de filas con el método rowCount
    }