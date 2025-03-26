<?php
namespace MarketZone;

abstract class Database {
    protected $conexion;

    public function __construct() {
        $this->conexion = new \mysqli(
            'localhost', 
            'root', 
            'cinepolis', 
            'marketzone'
        );
        
        if ($this->conexion->connect_error) {
            $this->handleError('Error de conexión: ' . $this->conexion->connect_error);
        }
        $this->conexion->set_charset("utf8");
    }

    protected function handleError($message) {
        header('Content-Type: application/json');
        die(json_encode([
            'status' => 'error',
            'message' => $message
        ]));
    }
}
?>