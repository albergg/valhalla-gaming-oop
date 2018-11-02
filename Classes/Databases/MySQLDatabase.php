<?php

namespace VG\Databases;

class MySQLDatabase implements Database {

    /**
     * @var string Host de la base de datos
     */
    private $db_host = 'localhost';

    /**
     * @var string Descripción
     */
    private $db_name = 'valhala_gaming';

    /**
     * @var string Descripción
     */
    private $db_charset = 'utf8mb4';
   
    /**
     * @var string Descripción
     */
    private $db_user = '';

    /**
     * @var string Descripción
     */
    private $db_pass = '';

    public function __construct() {
        $this->connect();
    }

    public function connect() {
        try {
            $this->conn = new PDO('mysql:host=' . self::db_host . ';dbname=' . self::db_name . ';charset=', $usuario, $contraseña);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
		    echo $exception->getMessage();
	    }
    }

    public function insert(array $data);

    // public function update();

    // public function delete();

    public function fetch(array $condition) {
        $query = $this->conn->query("
			SELECT *
			FROM movies
			WHERE title LIKE '%{$searchQuery}%'
		");
    }

    public function fetchAll();


}