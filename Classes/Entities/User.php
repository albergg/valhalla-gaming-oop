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

    
}





// metodo constructor, recibe los campos de un form valido

// metodos setters
// metodo verify password
// metodos getters

?>