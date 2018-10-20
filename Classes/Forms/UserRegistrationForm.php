<?php 
    namespace VG\Forms;

    class UserRegistrerForm {
 
        /**
         * @var array
         */
        private $errors;
        
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
        private $repeatPassword;

        /**
         * @var string
         */
        private $countryCode;

        /**
         * @var string
         */
        private  $avatar;
        
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

            $this->name = isset ($data['name']) ? trim($data['name']) : '';
            $this->email = isset ($data['email']) ? trim($data['email']) : '';
            $this->username = isset ($data['username']) ? trim($data['username']) : '';
            $this->password = isset ($data['password']) ? trim($data['password']) : '';
            $this->repeatPassword = isset ($data['repeatPassword']) ? trim($data['repeatPassword']) : '';
            $this->countryCode = isset ($data['countryCode']) ? trim($data['countryCode']) : '';
            /** @TODO implementar files */
            //$avatar = $files['userAvatar'];
        }

        /**
         * Valida el formulario. Devuelve true si es valido y false en caso contrario.
         * 
         * @return boolean
         */
        public function isValid() {
            
            // validacion de nombre
            if (empty($this->name)) {
                $this->errors['name'] = 'Escribe tu nombre completo';
            }
            // validacion de email
            if ( empty($this->email) ) {
                    $this->errors['email'] = 'Escribe tu correo electrónico';
            } else if ( !filter_var($this->email, FILTER_VALIDATE_EMAIL) ){
                    $this->errors['email'] = 'Escribe un correo válido';
            } else if (emailExist($this->email) ) {
                    $this->errors['email'] = 'Ese email ya fue registrado';
            }

            // validacion de nombre de usuario
            if (empty($this->username)) {
                $this->errors['username'] = 'El nombre de usuario no puede estar vacio';
            } elseif ( strlen($this->username) <6 ) {
                $this->errors['username'] = 'El usuario debe de contener minimo 6 caracteres';
            } else if (userExist($this->username) ) {
                $this->errors['username'] = 'Ese usuario ya fue registrado';
            }

            // validacion de passwords
            if ( empty($this->password) || empty($repeatPassword) ) {
                $this->errors['password'] = 'La contraseña no puede estar vacía';
            } elseif ( $this->password != $repeatPassword) {
                $this->errors['password'] = 'Las contraseñas no coinciden';
            } elseif ( strlen($this->password) < 4 || strlen($repeatPassword) < 4 ) {
                $this->errors['password'] = 'La contraseña debe tener minimo 4 caracteres';
            }

            // validacion de pais
            if ( empty($this->country) ) {
                $this->errors['country'] = 'Selecciona un país';
            }

            // validacion de avatar
            if ( $this->avatar['error'] !== UPLOAD_ERR_OK ) {
                $this->errors['image'] = 'Debes de subir una imagen';
            } else {
                $ext = pathinfo($this->avatar['name'], PATHINFO_EXTENSION);
                if ( !in_array($ext, ALLOWED_IMAGE_TYPES) ) {
                    $this->errors['image'] = 'Formato de imagen no valido';
                }
            }

            return empty($this->errors);
        }

        // funcion getErrors

        // getters
        public function getErrors() {
            return $this->errors;
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

        public function getName() {
            return $this->name;
        }
        
        public function getEmail() {
            return $this->email;
        }
        
        public function getUsername() {
            return $this->username;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getRepeatPassword() {
            return $this->repeatPassword;
        }

        public function getCountryCode() {
            return $this->countryCode;
        }

        public function getAvatar() {
            return $this->avatar;        
        }
    }
?>