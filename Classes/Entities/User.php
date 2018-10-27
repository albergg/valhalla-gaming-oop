<?php 
// es una entidad de usuario, se utiliza una vez que el formulario es valido.
// va a tener todas las propiedades del usuario
// va a tener las responsabilidades de setear y verificar el password
// objeto usuario

namespace VG\Entities;

class User
{
    // propiedades
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $avatar;

    
    // metodo constructor, recibe los campos de un form valido
    /**
 * Constructor de objeto usuario con los datos que llegan del formulario ya validados
 */

    public function __construct ($name, $email, $username, $password, $country) {
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->country = $country;
    }
    // metodos setters
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setUsername($username) {
        $this->username = $username;
    }
    
    public function setPassword($password) {
        // si está hasheado lo dejo igual
        $info = password_get_info($password);

        if ($info['algo'] != 0) {
            $this->password = $password;
        } else {
        // si no está hasheado lo hasheo
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        }
    }
    
    public function setCountry($country) {
        $this->country = $country;
    }
    
    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }


    public function hashPassword ($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    // Verificamos si el password es un hash
    // https://stackoverflow.com/questions/19406100/how-to-check-if-a-password-is-a-hash-php
    function passwordIsHashed($password)
    {
        $info = password_get_info($password);
        return $info['algo'] != 0;
    }

    
    // metodo verify password

    
}

// metodos getters

?>