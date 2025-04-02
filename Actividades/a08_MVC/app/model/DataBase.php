<?php

abstract class DataBase{
    
    protected $conexion; 
    protected $user;
    protected $password; 
    protected $database; 

    public function __construct($db, $user, $pass){
        $this->user = $user; 
        $this->password = $pass;
        $this->database = $db; 

        $this->conexion = new mysqli('localhost', 'root', 'cinepolis', 'marketzone'); 
   
        if ($this->conexion->connect_error) {
            die("Error en la conexión: " . $this->conexion->connect_error);
        }
    
    }
}
?>