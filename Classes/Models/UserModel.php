<?php

// ver https://github.com/digitalando/office-guru-oop-php/blob/master/Repositories/UserRepository.php

namespace VG\Models;

class UserModel {

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
            $this->conn = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . ';charset=', $usuario, $contraseña);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
		    echo $exception->getMessage();
	    }
    }

    public function insert(User $user) {
        // statement
        // insert into user values ...
        // bind value
        // :name $user->getName

    };

    // public function update();

    // public function delete();

    public function fetch(array $condition) {
        $query = $this->conn->query("
			SELECT *
			FROM movies
			WHERE title LIKE '%{$searchQuery}%'
		");
    };

    public function fetchAll();


}