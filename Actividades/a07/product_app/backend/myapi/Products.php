<?php
namespace MarketZone;

require_once __DIR__.'/database.php';

class Products extends Database {
    protected $response;
    
    public function __construct() {
        parent::__construct();
        $this->response = ['status' => 'error', 'message' => ''];
    }

    // Método para obtener la respuesta
    public function getResponse(): array {
        return $this->response;
    }

    // Método para enviar JSON
    public function sendResponse(): void {
        header('Content-Type: application/json');
        echo json_encode($this->response);
    }

    // Listar todos los productos
    public function list(): void {
        $result = $this->conexion->query("SELECT * FROM productos WHERE eliminado = 0");
        $this->response = $result->fetch_all(MYSQLI_ASSOC);
    }

    // Agregar producto
    public function add($data): void {
        $sql = "INSERT INTO productos VALUES (null, 
                '{$data['nombre']}', 
                '{$data['marca']}', 
                '{$data['modelo']}', 
                {$data['precio']}, 
                '{$data['detalles']}', 
                {$data['unidades']}, 
                '{$data['imagen']}', 
                0)";
        
        if($this->conexion->query($sql)) {
            $this->response = [
                'status' => 'success', 
                'message' => 'Producto agregado',
                'id' => $this->conexion->insert_id
            ];
        } else {
            $this->response['message'] = "Error: " . $this->conexion->error;
        }
    }

    // Editar producto
    public function edit($data): void {
        $sql = "UPDATE productos SET 
                nombre = '{$data['nombre']}', 
                marca = '{$data['marca']}', 
                modelo = '{$data['modelo']}', 
                precio = {$data['precio']}, 
                detalles = '{$data['detalles']}', 
                unidades = {$data['unidades']}, 
                imagen = '{$data['imagen']}' 
                WHERE id = {$data['id']}";
        
        if($this->conexion->query($sql)) {
            $this->response = ['status' => 'success', 'message' => 'Producto actualizado'];
        } else {
            $this->response['message'] = "Error: " . $this->conexion->error;
        }
    }

    // Eliminar producto (borrado lógico)
    public function delete($id): void {
        $sql = "UPDATE productos SET eliminado=1 WHERE id = $id";
        
        if($this->conexion->query($sql)) {
            $this->response = ['status' => 'success', 'message' => 'Producto eliminado'];
        } else {
            $this->response['message'] = "Error: " . $this->conexion->error;
        }
    }

    // Buscar productos
    public function search($term): void {
        $sql = "SELECT * FROM productos WHERE 
                (nombre LIKE '%$term%' OR 
                 marca LIKE '%$term%' OR 
                 detalles LIKE '%$term%') AND 
                eliminado = 0";
        
        $result = $this->conexion->query($sql);
        $this->response = $result->fetch_all(MYSQLI_ASSOC);
    }

    // Obtener un producto por ID
    public function single($id): void {
        $sql = "SELECT * FROM productos WHERE id = $id";
        $result = $this->conexion->query($sql);
        $this->response = $result->fetch_assoc();
    }
}

// Manejo de las peticiones
$action = $_GET['action'] ?? '';
$products = new Products();

switch($action) {
    case 'add':
        $products->add($_POST);
        break;
    case 'edit':
        $products->edit($_POST);
        break;
    case 'delete':
        $products->delete($_POST['id']);
        break;
    case 'search':
        $products->search($_GET['search']);
        break;
    case 'single':
        $products->single($_GET['id']);
        break;
    default:
        $products->list();
}

$products->sendResponse();
?>