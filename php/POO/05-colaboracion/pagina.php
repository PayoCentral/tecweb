<?php
class Pagina{
    private $cabecera;
    private $cuerpo;
    private $pie;
    
    public function __construct($texto1, $texto2){
        $this->cabecera = new Cabecera($texto1);
        $this->cuerpo = new cuerpo;
        $this->pie = new Pie($texto2);
    }
    
    public function insertar_cuerpo($texto){
        $this->cuerpo->insertar_parrafo($texto);
    }
    
    public function graficar(){
        $this->cabecera->graficar();
        $this->cuerpo->graficar();
        $this->pie->graficar();
    }
}

/**
 * Implementar las clases Cabecera, Cuerpo y Pie
 * 
 * 1. La clase Cabecera debe tener las siguientes caracteríscticas:
 *      Tiene un constructor que recibe un texto y lo almacena en un atributo.
 * 
 */
?>