<?php
namespace MarketZone;

require_once __DIR__.'/database.php';

class Products extends Database {
    protected $response;
    
    public function __construct() {
        parent::__construct();
        $this->response = ['status' => 'error', 'message' => ''];
    }

    public function list(): string {
        $result = $this->conexion->query("SELECT * FROM productos WHERE eliminado = 0");
        $this->response = $result->fetch_all(MYSQLI_ASSOC);
        return $this->getData();
    }

    public function add(array $data): string {
        try {
            $stmt = $this->conexion->prepare(
                "INSERT INTO productos VALUES (null, ?, ?, ?, ?, ?, ?, ?, 0)"
            );
            $stmt->bind_param(
                "sssdssi",
                $data['nombre'],
                $data['marca'],
                $data['modelo'],
                $data['precio'],
                $data['detalles'],
                $data['unidades'],
                $data['imagen']
            );
            
            if ($stmt->execute()) {
                $this->response = ['status' => 'success', 'message' => 'Producto agregado'];
            } else {
                throw new \Exception("Error al agregar: " . $stmt->error);
            }
        } catch (\Exception $e) {
            $this->response = ['status' => 'error', 'message' => $e->getMessage()];
        }
        return $this->getData();
    }

    public function delete(int $id): string {
        try {
            $stmt = $this->conexion->prepare(
                "UPDATE productos SET eliminado=1 WHERE id = ?"
            );
            $stmt->bind_param("i", $id);
            
            if ($stmt->execute()) {
                $this->response = ['status' => 'success', 'message' => 'Producto eliminado'];
            } else {
                throw new \Exception("Error al eliminar: " . $stmt->error);
            }
        } catch (\Exception $e) {
            $this->response = ['status' => 'error', 'message' => $e->getMessage()];
        }
        return $this->getData();
    }

    public function single(int $id): string {
        try {
            $stmt = $this->conexion->prepare(
                "SELECT * FROM productos WHERE id = ?"
            );
            $stmt->bind_param("i", $id);
            $stmt->execute();
            
            $result = $stmt->get_result();
            $this->response = $result->fetch_assoc();
            
            if (!$this->response) {
                throw new \Exception("Producto no encontrado");
            }
        } catch (\Exception $e) {
            $this->response = ['status' => 'error', 'message' => $e->getMessage()];
        }
        return $this->getData();
    }

    protected function getData(): string {
        header('Content-Type: application/json');
        return json_encode($this->response);
    }
}

// Manejo de solicitudes
try {
    $products = new Products();
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'single':
                    if (isset($_GET['id'])) {
                        echo $products->single($_GET['id']);
                    }
                    break;
                default:
                    echo $products->list();
            }
        } else {
            echo $products->list();
        }
    } 
    elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        
        switch ($_GET['action'] ?? '') {
            case 'add':
                echo $products->add($data);
                break;
            case 'edit':
                // Implementar edit si es necesario
                break;
            case 'delete':
                if (isset($data['id'])) {
                    echo $products->delete($data['id']);
                }
                break;
            default:
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'Acción no válida']);
        }
    }
    else {
        http_response_code(405);
        echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
    }
    
} catch (\Exception $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>