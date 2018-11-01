<?php 
namespace VG\Forms;

abstract class Form {
    /**
     * @var array $errors
     */
    private $errors;

    public function __construct() {
      $this->errors = [];
    }

    public abstract function isValid();

    /**
     * Array con los errores del formulario.
     *
     * @return array
     */
    public function getAllerrors() {
      return $this->errors;
    }

    /**
     * verifica si en el campo tiene error.
     *
     * @param string $field
     *
     * @return boolean
     */
    public function fieldHasErrors($field) {
      return isset($this->errors[$field]);
    }

    /**
     * devuelve el mensaje de error en caso de existir.
     *
     * @param string $field
     *
     * @return array|false
     */
    public function getFieldError($field) {
      return $this->errors[$field] ?? false;
    }

    /**
     * Agrega un error al array de errores.
     *
     * @param string $field
     * @param string $error
     *
     * @return array
     */
    public function addError($field, $error) {
      $this->errors[$field] = $error;
    }



}




?>