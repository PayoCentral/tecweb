<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php'; 
require __DIR__ . '/Create/Create.php';
require __DIR__ . '/Read/Read.php';
require __DIR__ . '/Update/Update.php';
require __DIR__ . '/Delete/Delete.php';

// Inicializar Slim
$app = AppFactory::create();
$app->setBasePath('/tecweb/Practicas/p12s/backend');  // ¡Añade esta línea después de crear $app!
$app->addBodyParsingMiddleware(); // Para leer JSON en las requests

// --- ENDPOINTS --- //

// GET: Listar todos los productos (equivalente a product-list.php)
$app->get('/products', function (Request $request, Response $response) {
    $read = new Backend\Read\Read();
    $result = $read->listProduct();
    $response->getBody()->write($result);
    return $response->withHeader('Content-Type', 'application/json');
});

// GET: Buscar productos (equivalente a product-search.php)
$app->get('/products/{search}', function (Request $request, Response $response, array $args) {
    $read = new Backend\Read\Read();
    $result = $read->searchProduct($args['search']);
    $response->getBody()->write($result);
    return $response->withHeader('Content-Type', 'application/json');
});

// GET: Obtener un producto por ID (equivalente a product-single.php)
$app->get('/product/{id}', function (Request $request, Response $response, array $args) {
    $read = new Backend\Read\Read();
    $result = $read->singleProduct($args['id']);
    $response->getBody()->write($result);
    return $response->withHeader('Content-Type', 'application/json');
});

// POST: Crear producto (equivalente a product-add.php)
$app->post('/product', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $create = new Backend\Create\Create();
    $result = $create->addProduct(
        $data['nombre'],
        $data['marca'],
        $data['modelo'],
        $data['precio'],
        $data['detalles'],
        $data['unidades'],
        $data['imagen']
    );
    $response->getBody()->write($result);
    return $response->withHeader('Content-Type', 'application/json');
});

// PUT: Actualizar producto (equivalente a product-edit.php)
$app->put('/product', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $update = new Backend\Update\Update();
    $result = $update->editProduct(
        $data['id'],
        $data['nombre'],
        $data['marca'],
        $data['modelo'],
        $data['precio'],
        $data['detalles'],
        $data['unidades'],
        $data['imagen']
    );
    $response->getBody()->write($result);
    return $response->withHeader('Content-Type', 'application/json');
});

// DELETE: Eliminar producto (equivalente a product-delete.php)
$app->delete('/product', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $delete = new Backend\Delete\Delete();
    $result = $delete->deleteData($data['id']);
    $response->getBody()->write($result);
    return $response->withHeader('Content-Type', 'application/json');
});

// Ejecutar la app
$app->run();