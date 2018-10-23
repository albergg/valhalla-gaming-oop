<?php 
namespace VG\Forms;

class UserLoginForm {

    /**
     * @var array
     */
    private $errors;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var boolean
     */
    private $rememberMe;

    /**
     * Constructor de la clase
     * 
     * Asigna las propiedades de la clase en funcion de la variable $_POST
     * Si post llega vacio, se asigan strings vacios a las propiedades
     * 
     * @param array $data Array de post
     */
    public function __construct  ($data) {
        // asignamos las propiedades con lo que llega de post
        $this->email = isset ($data['email']) ? trim($data['email']) : '';
        $this->password = isset ($data['password']) ? trim($data['password']) : '';
        $this->rememberMe = isset ($data['rememberMe']) ? true : false ;
    }

    /**
     * Valida el formulario. Devuelve true si es valido y false en caso contrario.
     * 
     * @return boolean
     */
    public function isValid() 
    {
        // validacion de email
        if ( empty($this->email) ) {
                $this->errors['email'] = 'Escribe tu correo electrónico';
        } else if ( !filter_var($this->email, FILTER_VALIDATE_EMAIL) ){
                $this->errors['email'] = 'Escribe un correo válido';
        }

        // validacion de passwords
        if ( empty($this->password) ) {
             $this->errors['password'] = 'La contraseña no puede estar vacía';
        // } elseif ( $this->password != ?????/) {
        // $this->errors['password'] = 'Las contraseñas no coinciden';
        } elseif ( strlen($this->password) < 4) {
            $this->errors['password'] = 'La contraseña debe tener minimo 4 caracteres';
        }

        return empty($this->errors);
    }

        /**
         * getters
         */

         public function getErrors(){
             return $this->errors;
         }
         public function getEmail(){
             return $this->email;
         }
         public function getPassword(){
             return $this->password;
         }
         public function getRememberMe(){
             return $this->rememberMe;
         }
         public function fieldHasErrors($field) {
            return isset($this->errors[$field]);
        } 

        public function getFieldErrors($field) {
            /*
            if (isset($this->errors[$field])) {
                return $this->errors[$field];
            } else {
                return false;
            }
            */
            return $this->errors[$field] ?? false;
        } 


}


?>