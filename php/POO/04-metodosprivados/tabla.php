<?php

class Tabla{
    private $matriz = array();
    private $numFilas;
    private $numColumnas;
    private $estilo;
    
    public function __construct($rows, $cols, $style){
        $this->numFilas = $rows;
        $this->numColumnas = $cols;
        $this->estilo = $style;
    }
    
    public function cargar($row, $col, $valor){
        $this->matriz[$row][$col] = $valor;
    }
    
    private function inicioTabla(){
        echo '<table style="'.$this->estilo.'">';
    }
    
    private function inicioFila(){
        echo '<tr>';
    }
    
    private function mostrar_dato($row, $col){
        echo '<td style="'.$this->estilo.'">';
        echo $this->matriz[$row][$col];
        echo '</td>';
    }
    
    private function finFila(){
        echo '</tr>';
    }
    
    private function finTabla(){
        echo '</table>';
    }
    
    public function graficar(){
        $this->inicioTabla();
        for($i=0;$i<$this->numFilas;$i++){
            $this->inicioFila();
            for($j=0;$j<$this->numColumnas;$j++){
                $this->mostrar_dato($i, $j);
            }
            $this->finFila();
        }
        $this->finTabla();
    }
}

?>